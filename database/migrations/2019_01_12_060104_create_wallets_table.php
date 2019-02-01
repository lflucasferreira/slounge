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
            $table->decimal('valor', 8, 2);
            $table->decimal('desconto', 8, 2)->nullable();
            $table->decimal('pago', 8, 2);
            $table->decimal('saldo', 8, 2)->nullable();
            $table->decimal('custos', 8, 2)->nullable();
            $table->date('data_pagamento')->nullable();
            $table->string('situacao')->nullable();
            $table->unsignedInteger('coupon_id')->nullable();
            $table->unsignedInteger('from_wallet_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('appointment_id')->references('id')->on('appointments')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('coupon_id')->references('id')->on('coupons')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('from_wallet_id')->references('id')->on('wallets')->onUpdate('cascade')->onDelete('restrict');
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
