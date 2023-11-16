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
        Schema::table('carousals', function (Blueprint $table) {
            $table->string('title')->nullable()->after('id');
            $table->string('description')->nullable()->after('title');
            $table->string('status')->nullable()->after('image');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('carousals', function (Blueprint $table) {
            //
        });
    }
};
