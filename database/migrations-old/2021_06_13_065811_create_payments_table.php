<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('code')->nullable();
            $table->string('date')->nullable();
            $table->enum('type', ['CustomerPayment', 'SupplierPayment']);
            $table->foreignId('contact_id');
            $table->foreignId('invoice_id')->nullable();
            $table->double('amount', 20,4)->nullable();
            $table->string('charge', 20,4)->nullable();
            $table->string('net_amount', 20,4)->nullable();
            $table->foreignId('payment_method_id');
            $table->string('transaction_id')->nullable();
            $table->string('receipt_no')->nullable();
            $table->string('note',500)->nullable();
            $table->foreignId('user_id');
            $table->foreignId('branch_id')->nullable();
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
