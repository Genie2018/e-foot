<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTerrainTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_terrain', function (Blueprint $table) {
            $table->increments('terrain_id');
            $table->string('terrain_nom');
            $table->integer('categorie_id');
            $table->integer('lieu_id');
            $table->integer('terrain_prix');
            $table->string('terrain _image');
            $table->integer('publication_status')->nullable();
            
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
        Schema::dropIfExists('table_terrain');
    }
}
