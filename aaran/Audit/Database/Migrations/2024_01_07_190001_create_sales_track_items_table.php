<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('sales_track_items', function (Blueprint $table) {
            $table->id();
            $table->integer('serial');
            $table->foreignId('sales_track_id')->references('id')->on('sales_tracks');
            $table->foreignId('client_id')->references('id')->on('clients');
            $table->integer('total_count')->nullable();
            $table->decimal('total_value',13,2)->nullable();
            $table->smallInteger('status')->nullable();
            $table->string('active_id', 10)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sales_track_items');
    }
};
