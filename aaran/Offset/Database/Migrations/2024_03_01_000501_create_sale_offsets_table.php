<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('sale_offsets', function (Blueprint $table) {
            $table->id();
            $table->string('uniqueno')->unique();
            $table->string('acyear')->nullable();
            $table->foreignId('company_id')->references('id')->on('companies');
            $table->foreignId('contact_id')->references('id')->on('contacts');
            $table->foreignId('order_id')->nullable();
            $table->integer('invoice_no');
            $table->date('invoice_date');
            $table->string('sales_type')->nullable();
            $table->decimal('total_qty',11,3)->nullable();
            $table->decimal('total_taxable',11,2)->nullable();
            $table->decimal('total_gst',11,2)->nullable();
            $table->foreignId('ledger_id')->nullable();
            $table->decimal('additional',11,2)->nullable();
            $table->decimal('round_off')->nullable();
            $table->decimal('grand_total',11,2)->nullable();
            $table->string('active_id',10)->nullable();
            $table->timestamps();
        });

        Schema::create('saleitem_offsets', function (Blueprint $table) {
            $table->id();
            $table->string('po_no')->nullable();
            $table->string('dc_no')->nullable();
            $table->foreignId('sale_offset_id')->references('id')->on('sale_offsets');
            $table->foreignId('product_id')->references('id')->on('products');
            $table->decimal('qty');
            $table->decimal('price');
            $table->string('gst_percent')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('saleitem_offsets');

        Schema::dropIfExists('sale_offsets');
    }
};
