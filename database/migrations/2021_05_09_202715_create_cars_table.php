<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('marka');
            $table->string('model');
            $table->foreignId('kategorija_id')->constrained('categories');
            $table->integer('godina_proizvodnje');
            $table->string('registarski_broj');
            $table->integer('broj_sjedista')->nullable();
            $table->integer('cijena_po_danu');
            $table->string('dodatne_napomene')->nullable();
            $table->string('fotografija')->default('https://image.shutterstock.com/z/stock-vector-photo-coming-soon-image-eps-86220151.jpg');
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
        Schema::dropIfExists('cars');
    }
}
