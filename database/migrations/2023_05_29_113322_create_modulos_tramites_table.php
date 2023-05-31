<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modulos_tramites', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_modulo')->nullable();
            $table->unsignedBigInteger('id_tramite')->nullable();
            $table->foreign('id_modulo')
          ->references('id')
          ->on('modulos')
          ->onDelete('cascade');
          $table->foreign('id_tramite')
          ->references('id')
          ->on('tramites')
          ->onDelete('cascade');
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
        Schema::dropIfExists('modulos_tramites');
    }
};
