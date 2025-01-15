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
            //name_registration_of_npc_back
            $table->string('name_registration_of_npc_back')->nullable();

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
