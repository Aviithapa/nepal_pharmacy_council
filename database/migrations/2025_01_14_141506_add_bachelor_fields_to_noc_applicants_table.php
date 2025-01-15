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
            $table->string('bachelor_transcript')->nullable();
            $table->string('bachelor_provisional')->nullable();
            $table->string('bachelor_character')->nullable();
            $table->string('bachelor_equivalence')->nullable();
            $table->string('name_registration_of_npc')->nullable();
            $table->boolean('good_standing')->default(false);
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
