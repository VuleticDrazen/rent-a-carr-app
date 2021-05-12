<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->date('datum_preuzimanja');
            $table->date('datum_vracanja');
            $table->foreignId('lokacija_preuzimanja')->constrained('locations');
            $table->foreignId('lokacija_vracanja')->constrained('locations');
            $table->foreignId('dodatna_oprema')->constrained('equipment');
            $table->foreignId('car_id')->constrained('cars');
            $table->integer('cijena_rezervacije');
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
        Schema::dropIfExists('reservations');
    }
}
