<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('preco', 8, 2);
            $table->date('data');
            $table->dateTime('inicio');
            $table->dateTime('fim');
            $table->string('observacao')->nullable();
            $table->unsignedInteger('client_id');
            $table->unsignedInteger('service_id');
            $table->unsignedInteger('coupon_id')->nullable();
            $table->boolean('status')->default(true); // 1 (true) para quando estiver ativo | 0 (false) para quando estiver inativo
            $table->string('situacao')->default('agendado'); // Opções disponíveis: agendado | cancelado | concluido | confirmado | reagendado
            $table->datetime('email_sent')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('client_id')->references('id')->on('clients')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('coupon_id')->references('id')->on('coupons')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('service_id')->references('id')->on('services')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}
