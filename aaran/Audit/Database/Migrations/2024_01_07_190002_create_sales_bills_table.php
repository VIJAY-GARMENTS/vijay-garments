<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('sales_track_bills', function (Blueprint $table) {
            $table->id();
            $table->integer('serial');
            $table->foreignId('sales_track_item_id')->references('id')->on('sales_track_items');
            $table->integer('vno')->nullable();
            $table->date('vdate')->nullable();
            $table->foreignId('client_id')->references('id')->on('clients');
            $table->decimal('taxable')->nullable();
            $table->decimal('gst')->nullable();
            $table->decimal('grand_total')->nullable();
            $table->string('vehicle')->nullable();
            $table->decimal('status')->nullable();
            $table->string('active_id', 10)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sales_track_bills');
    }
};
