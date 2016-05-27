<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaceconfigprogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TAceConfigProg', function (Blueprint $table) {
            $table->string('idProg', 4)->nullable();
            $table->string('Usuario', 20)->nullable();
            $table->string('idOper', 3)->nullable();
            $table->string('idEmpresa', 2)->nullable();
            $table->string('idCentro', 2)->nullable();
            $table->string('idSecu', 2)->nullable();
            $table->string('Alta', 1)->nullable();
            $table->string('Baja', 1)->nullable();
            $table->string('Modificacion', 1)->nullable();
            $table->string('Consulta', 1)->nullable();
            $table->timestamp('FechaRevocacion')->nullable();
            $table->string('Oper', 3)->nullable();
            $table->timestamp('Fecpro')->nullable();
            $table->string('NombreEquipo', 30)->nullable();
            $table->string('UsuarioWindows', 20)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('TAceConfigProg');
    }
}
