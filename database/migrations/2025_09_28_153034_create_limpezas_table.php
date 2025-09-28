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

        Schema::create('limpezas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('espaco_id')->constrained();
            $table->foreignId('responsavel_id')->constrained();
            $table->dateTime('data');
            $table->enum('status', ["pendente","concluida","em_andamento"]);
            $table->foreignId('responsavel_id_id');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('limpezas');
    }
};
