<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCommanderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_commander', function (Blueprint $table) {
            $table->increments('commander_id');
            $table->string('commander_email');
            $table->string('commander_nom');
            $table->string('commander_prenom');
            $table->string('commander_adresse');
            $table->string('commander_telephone');
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
        Schema::dropIfExists('table_commander');
    }
}
