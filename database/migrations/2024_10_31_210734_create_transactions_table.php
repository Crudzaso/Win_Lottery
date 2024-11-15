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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->decimal('amount', 8, 2); // Monto pagado
            $table->timestamp('date')->useCurrent(); // Fecha de la transacción
            $table->string('payment_method'); // Método de pago
            $table->unsignedBigInteger('user_id'); // ID del usuario (FK)
            $table->unsignedBigInteger('raffle_id'); // ID de la rifa (FK)
            $table->timestamps();
            $table->softDeletes();
    

            // Llaves foráneas
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('raffle_id')->references('id')->on('raffles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transacciones');
    }
};
