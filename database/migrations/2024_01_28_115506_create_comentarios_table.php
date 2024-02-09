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
        Schema::create('comentarios', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->string('contenido', 200);
            $table->integer('estatus');
            $table->timestamps();
            $table->foreignId('id_producto')->constrained('productos');
            // o puedes usar:
            // $table->unsignedBigInteger('id_producto');
            // $table->foreign('id_producto')->references('id')->on('productos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comentarios');
    }
};
