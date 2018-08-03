<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('immat');
            $table->string('type');
            $table->string('marque');
            $table->string('modele');
            $table->integer('annee_modele');
            $table->date('date_mise_circulation');
            $table->date('date_achat');
            $table->integer('puissance_fiscale');
            $table->integer('puissance_din');
            $table->string('energie');
            $table->string('couleur');
            $table->string('nbr_portes');
            $table->string('nbr_places');

            $table->timestamps();
            $table->softDeletes();
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
