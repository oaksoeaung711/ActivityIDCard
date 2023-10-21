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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('program_id')->nullable();
            $table->foreign('program_id')->references('id')->on('programs')->nullOnDelete();
            $table->unsignedBigInteger('batch_id')->nullable();
            $table->foreign('batch_id')->references('id')->on('batches')->nullOnDelete();
            $table->string('member_id')->nullable();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('campus');
            $table->string('guardianname');
            $table->string('dob');
            $table->string('emergencyphone1');
            $table->string('emergencyphone2');
            $table->string('schoolemergencyphone');
            $table->string('studentprofilepicture')->nullable();
            $table->string('dateofissue');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
