<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Servico extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('tempo')->nullable();
            $table->date('data');
            $table->integer('id_servico_lista');
            $table->foreign('id_servico_lista')->references('id')->on('servico_listas');
            $table->integer('id_company');
            $table->foreign('id_company')->references('id')->on('companies');
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
        Schema::dropIfExists('servicos');
    }
}
