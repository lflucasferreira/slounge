<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRewardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rewards', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('appointment_id')->nullable();
            $table->unsignedInteger('client_id');
            $table->unsignedInteger('user_id');
            $table->integer('pontos');
            $table->dateTime('validade')->nullable();
            $table->boolean('status')->default(true); // 1 - Se estiver ativo (torna-se 0 caso haja validade e esteja expirada) | 0 - Se estiver inativo (ou quando expirado pela validade)
            $table->boolean('resgatado')->default(false); // 1 - Se foi utilizado (resgatado) | 0 - Se ainda estiver disponível
            $table->text('observacao')->nullable();
            $table->timestamps();

            $table->foreign('appointment_id')->references('id')->on('appointments')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('client_id')->references('id')->on('clients')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rewards');
    }
}
