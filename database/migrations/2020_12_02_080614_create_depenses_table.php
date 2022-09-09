<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('depenses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products');
            $table->string('code')->unique();
            $table->string('quantité')->nullable();
            $table->string('référence')->unique();
            $table->string('transport')->nullable();
            $table->bigInteger('frais_t')->nullable();
            $table->string('paiement')->nullable();
            $table->bigInteger('frais_p')->nullable();
            $table->bigInteger('frais_totaux')->nullable();
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
        Schema::dropIfExists('depenses');
    }
}
