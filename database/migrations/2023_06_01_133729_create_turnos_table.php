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
        Schema::create('turnos', function (Blueprint $table) {
            $table->id();
            $table->string('name',100);
            $table->unsignedBigInteger('atencion')->nullable();
            $table->unsignedBigInteger('idcita')->nullable();
            $table->unsignedBigInteger('idmodulo')->nullable();
            $table->foreign('idmodulo')
            ->references('id')
            ->on('modulos')
            ->onDelete('cascade');
            $table->foreign('idcita')
            ->references('id')
            ->on('citas')
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
        Schema::dropIfExists('turnos');
    }
};
