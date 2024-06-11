<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('kosts', function (Blueprint $table) {
            $table->dropForeign(['rooms_id']);
            $table->dropColumn('rooms_id');
        });

        Schema::table('kosts', function (Blueprint $table) {
            $table->foreignId('rooms_id')->nullable()->constrained('rooms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kosts', function (Blueprint $table) {
            $table->dropForeign(['rooms_id']);
            $table->dropColumn('rooms_id');
        });

        Schema::table('kosts', function (Blueprint $table) {
            $table->foreignId('rooms_id')->constrained('rooms');
        });
    }
};
