@component('mail::message')
# Invoice Received

A client has paid. Find details below:

### Payment Details for Order -- {{$payment->batch_code}}

#### Payment Details
@component('mail::table')
| Name                    | Email                    | Address                     | Amount     | Date Paid  |
| ----------------------- |--------------------------| ----------------------------| -----------|------------|
| {{auth()->user()->name}}| {{auth()->user()->email}}| {{auth()->user()->address}} | {{$payment->currency}} {{number_format($payment->amout)}} | {{date('d M, Y', strtotime($payment->transaction_date))}}|
@endcomponent

#### Order Details
@component('mail::table')
| Product                 | Unit Price(N)         | Qty                     | Total Price(N) | 
| ----------------------- |--------------------------| ----------------------------| -----------|
@foreach($payment->orders as $order)
| {{$order->product_name}}| &#8358;{{number_format($order->price, 2)}}| {{$order->quantity}} | &#8358;{{number_format($order->total, 2)}}|
@endforeach
@endcomponent

@component('mail::button', ['url' => url('/')])
Sign in
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent