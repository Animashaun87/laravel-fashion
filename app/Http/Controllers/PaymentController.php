<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Paystack;
use App\Order;
use App\Payment;
use Gloudemans\Shoppingcart\Facades\Cart;

use App\Mail\ClientInvoiceMail;
use App\Mail\MerchantInvoice;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{

    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway(Request $request)
    {
    	//save order details in db as yet to pay
    	$batch_code = $request->orderID;

        $payment = new Payment();
        $payment->email = auth()->user()->email;
        $payment->batch_code = $batch_code;
        $payment->reference = $request->reference;
        $payment->amount = ($request->amount / 100);
        $payment->order_id = $batch_code;
        $payment->user_id = auth()->user()->id;
        $payment->save();

        foreach (\Cart::instance('default')->content() as $item) {
            $order = new Order();
            $order->product_id = $item->model->id;
            $order->product_name = $item->model->name;
            $order->price = $item->price;
            $order->quantity = $item->qty;
            $order->total = $item->qty * $item->price;
            $order->user_id = auth()->user()->id;
            $order->batch_code = $batch_code;
            $order->payment_id = $payment->id;
            $order->save();
        }
        return Paystack::getAuthorizationUrl()->redirectNow();
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();

        $status = $paymentDetails['status'];
        $message = $paymentDetails['message'];
        $payment = Payment::where('reference', $paymentDetails['data']['reference'])->first();
        if (!$payment) {
            flash('Invalid payment', 'danger');
            return redirect('/');
        }
        $payment->status = $status;
        $payment->message = $message;
        if ($status == 00 || $status == 01 || $status == true) {
            $payment->successful = 1;
        } else {
            flash($message, 'danger');
            return redirect('pay/'.$payment->order_id);
        }
        if ($paymentDetails['data']) {
            $payment->currency = $paymentDetails['data']['currency'];
            $payment->transaction_date = $paymentDetails['data']['transaction_date'];
            $payment->domain = $paymentDetails['data']['domain'];
            $payment->gateway_response = $paymentDetails['data']['gateway_response'];
            $payment->channel = $paymentDetails['data']['channel'];
            $payment->ip_address = $paymentDetails['data']['ip_address'];
            if ($paymentDetails['data']['authorization']) {
                $payment->authorization_code = $paymentDetails['data']['authorization']['authorization_code'];
                $payment->bin = $paymentDetails['data']['authorization']['bin'];
                $payment->last4 = $paymentDetails['data']['authorization']['last4'];
                $payment->exp_month = $paymentDetails['data']['authorization']['exp_month'];
                $payment->exp_year = $paymentDetails['data']['authorization']['exp_year'];
                $payment->channel = $paymentDetails['data']['authorization']['channel'];
                $payment->card_type = $paymentDetails['data']['authorization']['card_type'];
                $payment->bank = $paymentDetails['data']['authorization']['bank'];
                $payment->country_code = $paymentDetails['data']['authorization']['country_code'];
                $payment->brand = $paymentDetails['data']['authorization']['brand'];
                $payment->reusable = $paymentDetails['data']['authorization']['reusable'];
                $payment->signature = $paymentDetails['data']['authorization']['signature'];

            }

        }
        $payment->save();
        //send mail to user and merchant

        Mail::to(auth()->user())->send(new ClientInvoiceMail(auth()->user(), $payment));
        Mail::to(config('app.support_mail'))->send(new MerchantInvoice(auth()->user(), $payment));

        flash($message, 'success');
        if ($payment->successful == 1) {
            //mark orders as paid
            foreach ($payment->orders as $order) {
                $order->paid = 1;
                $order->save();
            }
            Cart::instance('default')->destroy();
            return redirect('invoice/'.$payment->batch_code);
        }
        return redirect('checkout');
    }

    function invoice($batch_code)
    {
        $payment = Payment::with(['orders'])->where(['batch_code' => $batch_code, 'successful' => 1, 'user_id' => auth()->user()->id])->first();
        if (!$payment) {
            flash('Invalid invoice', 'danger');
            return redirect()->back();
        }
        return view('payments.invoice', compact('payment'));
    }
}