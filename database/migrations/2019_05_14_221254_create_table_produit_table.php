<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProduitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_produit', function (Blueprint $table) {
            $table->increments('produit_id');
            $table->string('produit_nom');
            $table->integer('categorie_id');
            $table->integer('fournisseur_id');
            $table->text('produit_court_desc');
            $table->text('produit_long_desc');
            $table->integer('produit_prix');
            $table->string('produit_image');
            $table->string('produit_size');
            $table->string('produit_couleur');
            $table->integer('publication_status');
            
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
        Schema::dropIfExists('table_produit');
    }
}
