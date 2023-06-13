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
        Schema::create('citas', function (Blueprint $table) {
            $table->id();
            $table->date('fechaCita')->nullable();
            $table->time('hora')->nullable();
            $table->unsignedBigInteger('numerocitas')->nullable();
            $table->string('nombre', 100)->nullable();
            $table->string('apellido', 100)->nullable();
            $table->string('documento', 100)->nullable();
            $table->unsignedBigInteger('identificacion')->nullable();
            $table->unsignedBigInteger('idTramite')->nullable();
            $table->unsignedBigInteger('idestado')->nullable();
            $table->foreign('idTramite')
            ->references('id')
            ->on('tramites')
            ->onDelete('cascade');
            $table->foreign('idestado')
            ->references('id')
            ->on('estados')
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
        Schema::dropIfExists('citas');
    }
};
