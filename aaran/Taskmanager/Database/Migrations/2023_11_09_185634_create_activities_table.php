<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->date('cdate');
            $table->text('vname');
            $table->string('client_id')->nullable();
            $table->string('duration')->nullable();
            $table->string('channel')->nullable();
            $table->text('remarks')->nullable();
            $table->foreignId('company_id')->references('id')->on('companies');
            $table->string('active_id',3)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
