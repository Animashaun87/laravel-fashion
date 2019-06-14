<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email');
            $table->string('user_id');
            $table->string('order_id')->nullable();
            $table->string('batch_code')->nullable();
            $table->double('amount');
            $table->integer('quantity')->default(1);
            $table->string('reference');
            $table->string('status')->default('00');
            $table->string('currency')->nullable();
            $table->string('transaction_date')->nullable();
            $table->string('domain')->nullable();
            $table->string('gateway_response')->nullable();
            $table->string('channel')->nullable();
            $table->string('ip_address')->nullable();
            $table->string('message')->nullable();
            $table->string('authorization_code')->nullable();
            $table->string('bin')->nullable();
            $table->string('last4')->nullable();
            $table->string('exp_month')->nullable();
            $table->string('exp_year')->nullable();
            $table->string('card_type')->nullable();
            $table->string('bank')->nullable();
            $table->string('country_code')->nullable();
            $table->string('brand')->nullable();
            $table->string('reusable')->nullable();
            $table->string('signature')->nullable();
            $table->string('successful')->default(0);
            $table->string('order_status')->default('pending');
            $table->string('order_comment')->nullable();
            $table->string('order_internal_comment')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
