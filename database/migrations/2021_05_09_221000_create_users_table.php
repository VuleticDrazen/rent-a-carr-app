<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('drzava_id')->nullable()->constrained('countries');
            $table->integer('broj_pasosa')->nullable();
            $table->string('email')->nullable();
            $table->string('broj_telefona')->nullable();
            $table->dateTime('datum_prve_rezervacije')->nullable();
            $table->dateTime('datum_poslednje_rezervacije')->nullable();
            $table->string('dodatne_napomene')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
