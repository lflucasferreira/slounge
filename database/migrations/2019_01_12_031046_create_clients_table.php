<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('sobrenome');
            $table->string('endereco')->nullable();
            $table->string('complemento')->nullable();
            $table->string('edificio')->nullable();
            $table->string('bairro')->nullable();
            $table->string('cidade')->nullable();
            $table->string('cep')->nullable();
            $table->string('estado')->nullable();
            $table->string('cpf')->nullable()->unique();
            $table->string('rg')->nullable();
            $table->string('orgao')->nullable();
            $table->string('email')->nullable()->unique();
            $table->string('telefone_fixo')->nullable();
            $table->string('telefone_celular')->nullable();
            $table->string('telefone_comercial')->nullable();
            $table->date('data_nascimento')->nullable();
            $table->boolean('status')->default('1');
            $table->boolean('tipo')->default('0'); // 0 - Pessoa Física | 1 - Pessoa Jurídica
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
        Schema::dropIfExists('clients');
    }
}
