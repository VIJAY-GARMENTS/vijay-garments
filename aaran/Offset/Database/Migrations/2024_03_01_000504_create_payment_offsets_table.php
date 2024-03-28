<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('payment_offsets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->references('id')->on('companies');
            $table->string('acyear')->nullable();
            $table->date('vdate');
            $table->foreignId('contact_id')->references('id')->on('contacts');
            $table->foreignId('receipttype_id')->references('id')->on('receipttypes');
            $table->string('chq_no')->nullable();
            $table->string('chq_date')->nullable();
            $table->foreignId('bank_id')->nullable();
            $table->decimal('payment_amount',11,2);
            $table->string('active_id',10)->nullable();
            $table->timestamps();
        });

        Schema::create('paymentitem_offsets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('payment_offset_id')->references('id')->on('payment_offsets');
            $table->string('againstby')->nullable();
            $table->string('vno')->nullable();
            $table->decimal('vamount',11,2)->nullable();
            $table->decimal('ramount',11,2)->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('paymentitem_offsets');

        Schema::dropIfExists('payment_offsets');
    }
};
