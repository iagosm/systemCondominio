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
        Schema::disableForeignKeyConstraints();

        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('morador_id')->constrained();
            $table->foreignId('espaco_id')->constrained();
            $table->enum('status', ["pendente","confirmada","cancelada"]);
            $table->decimal('valor', 8, 2);
            $table->dateTime('data');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};
