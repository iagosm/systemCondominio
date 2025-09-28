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

        Schema::create('sugestaos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('morador_id')->constrained();
            $table->string('titulo');
            $table->text('descricao');
            $table->enum('status', ["pendente","aprovada","concluida"]);
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sugestaos');
    }
};
