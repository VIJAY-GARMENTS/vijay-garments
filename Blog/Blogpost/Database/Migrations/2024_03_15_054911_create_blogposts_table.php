<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('blogposts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('heading')->unique();
            $table->text('body');
            $table->longText('logo')->nullable();
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('blogposts');
    }
};
