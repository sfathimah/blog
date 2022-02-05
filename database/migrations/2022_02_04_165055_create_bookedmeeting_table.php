<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookedmeetingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookedmeeting', function (Blueprint $table) {
            $table->id();
            $table->string('patientid');
            $table->date('date');
            $table->string('service');
            $table->string('dentistid');
            $table->string('dentistname');
            $table->string('slot');
            $table->string('symptom');
            $table->string('status');
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
        Schema::dropIfExists('bookedmeeting');
    }
}
