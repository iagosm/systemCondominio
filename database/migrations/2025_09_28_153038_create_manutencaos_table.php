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

        Schema::create('manutencaos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('espaco_id')->constrained();
            $table->enum('tipo', ["preventiva","corretiva"]);
            $table->foreignId('responsavel_id')->constrained();
            $table->text('descricao');
            $table->dateTime('data_prevista');
            $table->dateTime('data_conclusao')->nullable();
            $table->enum('status', ["pendente","em_andamento","concluida"]);
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
        Schema::dropIfExists('manutencaos');
    }
};
