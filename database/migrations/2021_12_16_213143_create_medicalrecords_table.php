<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalrecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicalrecords', function (Blueprint $table) {
            $table->id();
            $table->string('PatientID');
            $table->string('Patient_Name');
            $table->string('admit');
            $table->string('admit_reason');
            $table->string('admit_treatment');
            $table->string('illness');
            $table->string('illness_reason');
            $table->string('illness_treatment');
            $table->string('medication');
            $table->string('medication_notes');
            $table->string('allergies');
            $table->string('allergies_notes');
            $table->string('pregnancy');
            $table->string('pregnancy_notes');
            $table->string('others');
            $table->string('others_notes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicalrecords');
    }
}
