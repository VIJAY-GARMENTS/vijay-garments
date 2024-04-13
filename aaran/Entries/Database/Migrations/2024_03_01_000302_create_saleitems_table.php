<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('saleitems', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sale_id')->references('id')->on('sales');
            $table->foreignId('product_id')->references('id')->on('products');
            $table->decimal('qty');
            $table->decimal('price');
            $table->string('gst_percent')->nullable();
            $table->timestamps();
        });

        Schema::create('saleitem_garments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sale_id')->references('id')->on('sales');
            $table->foreignId('colour_id')->references('id')->on('colours');
            $table->foreignId('size_id')->references('id')->on('sizes');
            $table->string('description')->nullable();
            $table->timestamps();
        });

        Schema::create('saleitem_offsets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sale_id')->references('id')->on('sales');
            $table->string('po_no')->nullable();
            $table->string('dc_no')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('saleitem_offsets');

        Schema::dropIfExists('saleitem_garments');

        Schema::dropIfExists('saleitems');
    }
};
