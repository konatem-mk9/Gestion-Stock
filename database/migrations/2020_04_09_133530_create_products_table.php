<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code')->unique();
            $table->string('libellé')->unique();
            $table->integer('quantité')->nullable();
            $table->string('categorie')->nullable();
            $table->bigInteger('categorie_id')->unsigned();
            $table->foreign('categorie_id')->references('id')->on('category');
            $table->string('fournisseur')->nullable();
            $table->bigInteger('fournisseur_id')->unsigned();
            $table->foreign('fournisseur_id')->references('id')->on('fournisseurs');
            $table->string('prix_ht_achat');
            $table->string('prix_ht_vente');
            $table->integer('tva')->default(18);
            $table->string('prix_ttc_achat');
            $table->string('prix_ttc_vente');
            $table->date('date_achat');
            $table->boolean('en_stock')->default(false);
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
        Schema::dropIfExists('products');
    }
}
