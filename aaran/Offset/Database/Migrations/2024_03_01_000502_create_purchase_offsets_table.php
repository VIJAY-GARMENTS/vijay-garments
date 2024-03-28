<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('purchase_offsets', function (Blueprint $table) {
            $table->id();
            $table->string('uniqueno')->unique();
            $table->string('acyear')->nullable();
            $table->foreignId('company_id')->references('id')->on('companies');
            $table->foreignId('contact_id')->references('id')->on('contacts');
            $table->foreignId('order_id')->nullable();
            $table->string('purchase_no')->nullable();
            $table->date('purchase_date');
            $table->integer('Entry_no')->nullable();
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

        Schema::create('purchaseitem_offsets', function (Blueprint $table) {
            $table->id();
            $table->string('po_no')->nullable();
            $table->string('dc_no')->nullable();
            $table->foreignId('purchase_offset_id')->references('id')->on('purchase_offsets');
            $table->foreignId('product_id')->references('id')->on('products');
            $table->foreignId('colour_id')->references('id')->on('colours');
            $table->foreignId('size_id')->references('id')->on('sizes');
            $table->decimal('qty');
            $table->decimal('price');
            $table->string('gst_percent')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('purchaseitem_offsets');

        Schema::dropIfExists('purchase_offsets');
    }
};
