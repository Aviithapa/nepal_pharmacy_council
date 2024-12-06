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
        Schema::table('result_uploads', function (Blueprint $table) {
            $table->string('obtain_marks')->nullable()->index(); // Indexed for faster queries
            $table->string('exam')->nullable();
            $table->enum('level', ['pharmacist', 'pharmacy assistant'])->nullable(); // Constrained values
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('result_uploads', function (Blueprint $table) {
            //
        });
    }
};
