<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('uniqueno')->unique();
            $table->string('acyear')->nullable();
            $table->foreignId('company_id')->references('id')->on('companies');
            $table->foreignId('contact_id')->references('id')->on('contacts');
            $table->integer('invoice_no');
            $table->date('invoice_date');
            $table->string('sales_type')->nullable();
            $table->decimal('total_qty', 11, 3)->nullable();
            $table->decimal('total_taxable', 11, 2)->nullable();
            $table->decimal('total_gst', 11, 2)->nullable();
            $table->foreignId('ledger_id')->nullable();
            $table->decimal('additional', 11, 2)->nullable();
            $table->decimal('round_off')->nullable();
            $table->decimal('grand_total', 11, 2)->nullable();
            $table->string('active_id', 10)->nullable();
            $table->timestamps();
        });


        Schema::create('sale_garments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sale_id')->references('id')->on('sales');
            $table->foreignId('billing_id')->nullable();
            $table->foreignId('shipping_id')->nullable();
            $table->foreignId('order_id')->references('id')->on('orders');
            $table->foreignId('style_id')->references('id')->on('styles');
            $table->foreignId('despatch_id')->references('id')->on('despatches');
            $table->foreignId('transport_id')->references('id')->on('transports');
            $table->string('destination')->nullable();
            $table->string('bundle')->nullable();
        });

        Schema::create('sale_offset', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sale_id')->references('id')->on('sales');
            $table->foreignId('billing_id')->nullable();
            $table->foreignId('shipping_id')->nullable();
            $table->foreignId('order_id')->references('id')->on('orders');
        });


    }

    public function down()
    {
        Schema::dropIfExists('sale_offsets');

        Schema::dropIfExists('sale_garments');

        Schema::dropIfExists('sales');
    }
};
