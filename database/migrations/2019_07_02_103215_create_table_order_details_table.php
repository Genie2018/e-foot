<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_order_details', function (Blueprint $table) {
            $table->increments('order_details_id');
            $table->integer('order_id');
            $table->integer('produit_id');
            $table->string('produit_nom');
            $table->string('produit_quantite');
            $table->string('produit_prix');
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
        Schema::dropIfExists('table_order_details');
    }
}
