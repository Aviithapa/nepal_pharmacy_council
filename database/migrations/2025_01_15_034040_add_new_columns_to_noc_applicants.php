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
        Schema::table('noc_applicants', function (Blueprint $table) {
            $table->string('bachelor_institute')->nullable();
            $table->year('bachelor_year')->nullable();
            $table->string('bachelor_grade')->nullable();
            $table->string('bachelor_reg_no')->nullable();
            $table->text('bachelor_remarks')->nullable();
            $table->string('position')->nullable();
            $table->string('registration_number')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('noc_applicants', function (Blueprint $table) {
            //
        });
    }
};
