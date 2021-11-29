<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVragenlijstenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vragenlijsten', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('puntenschaal');
            $table->string('naam')->unique();
            $table->string('volledigeNaam');
            $table->string('hoofdVraag');
            $table->string('descriptie');
            $table->string('vraag_ids');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vragenlijsten');
    }
}
