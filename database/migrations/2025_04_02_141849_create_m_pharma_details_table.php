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
        Schema::create('m_pharma_details', function (Blueprint $table) {
            $table->id();
            // Personal Information
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');

            $table->string('first_name_nepali');
            $table->string('middle_name_nepali')->nullable();
            $table->string('last_name_nepali');

            $table->string('title')->nullable();

            $table->date('dob_ad'); // Date of Birth AD
            $table->date('dob_bs'); // Date of Birth BS
            $table->string('father_name'); // Father Name
            $table->string('mother_name'); // Mother Name
            $table->enum('gender', ['male', 'female', 'other']);
            $table->string('citizenship'); // Citizenship Number
            $table->string('issued_district'); // Issued District

            $table->string('district');
            $table->string('municipality');
            $table->string('ward');
            $table->string('tole');

            $table->string('slc_institute');
            $table->year('slc_year');
            $table->string('slc_grade');
            $table->string('slc_reg_no');
            $table->text('slc_remarks')->nullable();

            $table->string('plus2_institute');
            $table->year('plus2_year');
            $table->string('plus2_grade');
            $table->string('plus2_reg_no');
            $table->text('plus2_remarks')->nullable();

            $table->string('bachelor_institute');
            $table->year('bachelor_year');
            $table->string('bachelor_grade');
            $table->string('bachelor_reg_no');
            $table->text('bachelor_remarks')->nullable();

            $table->string('master_institute');
            $table->year('master_year');
            $table->string('master_grade');
            $table->string('master_reg_no');
            $table->text('master_remarks')->nullable();

            $table->string('npc_registration_number');
            $table->string('npc_registration_date');


            $table->string('citizenship_front')->nullable();
            $table->string('citizenship_back')->nullable();

            $table->string('name_registration_of_npc_front');
            $table->string('name_registration_of_npc_back');

            $table->string('master_in_pharmacy_transcript_front');
            $table->string('master_in_pharmacy_transcript_back');
            $table->string('experience_details')->nullable();
        
            $table->enum('status', ['pending', 'rejected', 'approved'])->default('pending'); // Status
            $table->text('remarks')->nullable(); // Remarks

            $table->string('pdf_link')->nullable();
            $table->integer('ref')->nullable();
            $table->string('uuid')->nullable();

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_pharma_details');
    }
};
