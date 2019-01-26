<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWalletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wallets', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('appointment_id');
            $table->unsignedInteger('user_id');
            $table->decimal('valor_total', 8, 2);
            $table->decimal('desconto', 8, 2)->nullable();
            $table->decimal('valor_pago', 8, 2);
            $table->decimal('saldo', 8, 2)->nullable();
            $table->decimal('custos', 8, 2)->nullable();
            $table->date('data_pagamento')->nullable();
            $table->string('situacao')->nullable();
            $table->unsignedInteger('cupom_id')->nullable();
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
        Schema::dropIfExists('wallets');
    }
}
