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
            $table->foreignId('rooms_id')->constrained('rooms');
            $table->string('original_photoname')->after('rooms_id')->nullable();
            $table->string('encrypted_photoname')->after('original_photoname')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kosts', function (Blueprint $table) {
            $table->dropColumn('original_photoname');
            $table->dropColumn('encrypted_photoname');
        });
    }
};
