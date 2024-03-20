<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bank_statement_entries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_banks_id')->references('id')->on('client_banks');
            $table->date('entry')->nullable();
            $table->string('remarks')->nullable();
            $table->string('status_id', 3)->nullable();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->string('active_id',10)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bank_statement_entries');
    }
};
