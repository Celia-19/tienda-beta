<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            $table->decimal('cantidad');
            $table->decimal('precio');
            $table->timestamps();
            $table->unsignedBigInteger('id_producto');
            $table->unsignedBigInteger('id_pedido');
            $table->integer('estatus');

        
            $table->foreign('id_producto')->references('id')->on('productos');
            $table->foreign('id_pedido')->references('id')->on('pedidos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compras');
    }
};
