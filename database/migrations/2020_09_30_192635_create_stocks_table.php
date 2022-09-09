<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products');
            $table->string('code')->unique();
            $table->string('libellé')->unique();
            $table->integer('stock_initial')->default(0);
            $table->integer('quantité')->nullable();
            $table->integer('stock')->nullable();
            $table->integer('sortie')->nullable();
            $table->integer('difference')->nullable();
            $table->integer('seuil')->default(10);
            $table->double('prix_ttc_achat')->nullable();
            $table->double('prix_ht_vente')->nullable();
            $table->double('profit')->nullable();        
            $table->boolean('status')->default(false);
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
        Schema::dropIfExists('stocks');
    }
}
