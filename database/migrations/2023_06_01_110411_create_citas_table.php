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
            $table->string('hora', 100);
            $table->unsignedBigInteger('numerocitas')->nullable();
            $table->string('nombre', 100);
            $table->string('apellido', 100);
            $table->string('documento', 100);
            $table->unsignedBigInteger('identificacion')->unique();
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
