<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Company;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('empresa')->required();
            $table->string('responsavel')->nullable();
            $table->string('setor')->nullable();
            $table->string('email')->unique();
            $table->string('whats')->nullable();
            $table->string('horas')->nullable();
            $table->string('url_hospedagem')->nullable();
            $table->string('user_hospedagem')->nullable();
            $table->string('pw_hospedagem')->nullable();
            $table->string('url_googleads')->nullable();
            $table->string('user_googleads')->nullable();
            $table->string('pw_googleads')->nullable();
            $table->string('url_linkedin')->nullable();
            $table->string('user_linkedin')->nullable();
            $table->string('pw_linkedin')->nullable();
            $table->string('url_twitter')->nullable();
            $table->string('user_twitter')->nullable();
            $table->string('pw_twitter')->nullable();
            $table->string('url_youtube')->nullable();
            $table->string('user_youtube')->nullable();
            $table->string('pw_youtube')->nullable();
            $table->string('url_facebook')->nullable();
            $table->string('user_facebook')->nullable();
            $table->string('pw_facebook')->nullable();
            $table->string('url_instagram')->nullable();
            $table->string('user_instagram')->nullable();
            $table->string('pw_instagram')->nullable();
            $table->string('margem')->nullable();
            $table->string('faturamento')->nullable();
            $table->string('clientes')->nullable();
            $table->string('fans_face')->nullable();
            $table->string('seguidores_insta')->nullable();
            $table->string('inscritos')->nullable();
            $table->string('contatos')->nullable();
            $table->string('seguidores_twitter')->nullable();
            $table->string('obs')->nullable();
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
        Schema::dropIfExists('companies');
    }
}
