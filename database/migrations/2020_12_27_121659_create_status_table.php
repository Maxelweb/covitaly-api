<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('piemonte');
            $table->string('veneto');
            $table->string('lombardia');
            $table->string('emiliaromagna');
            $table->string('umbria');
            $table->string('lazio');
            $table->string('toscana');
            $table->string('abruzzo');
            $table->string('molise');
            $table->string('basilicata');
            $table->string('puglia');
            $table->string('marche');
            $table->string('sicilia');
            $table->string('sardegna');
            $table->string('liguria');
            $table->string('trento');
            $table->string('bolzano');
            $table->string('friuliveneziagiulia');
            $table->string('valledaosta');
            $table->string('campania');
            $table->string('calabria');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('status');
    }
}
