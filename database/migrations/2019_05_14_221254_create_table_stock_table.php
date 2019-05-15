<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableStockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_stock', function (Blueprint $table) {
            $table->increments('stock_id');
            $table->increments('stock_nom');
            $table->integer('categorie_id');
            $table->integer('produit_id');
            $table->text('stock_court_desc');
            $table->text('stock_long_desc');
            $table->float('stock_prix');
            $table->string('stock_image');
            $table->string('stock_size');
            $table->string('stock_couleur');
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
        Schema::dropIfExists('table_stock');
    }
}
