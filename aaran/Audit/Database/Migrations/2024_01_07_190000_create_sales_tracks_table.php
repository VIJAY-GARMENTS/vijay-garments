<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sales_tracks', function (Blueprint $table) {
            $table->id();
            $table->integer('month')->nullable();
            $table->integer('year')->nullable();
            $table->string('vname')->unique();
            $table->integer('status')->nullable();
            $table->foreignId('company_id')->references('id')->on('companies');
            $table->string('active_id',10)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sales_tracks');
    }
};
