<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNouvellesVentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nouvelles_ventes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $tabel->string('titulaire')->nullable();
            $tabel->string('banque')->nullable();
            $tabel->string('numero_compte')->nullable();
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
        Schema::dropIfExists('nouvelles_ventes');
    }
}
