<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('notice_boards', function (Blueprint $table) {
            $table->string('priority')
                ->after('user_id')
                ->default('0')
                ->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('notice_boards', function (Blueprint $table) {
            $table->dropColumn('priority');
        });
    }
};
