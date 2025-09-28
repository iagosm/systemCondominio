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

        Schema::create('morador_unidades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('morador_id')->constrained();
            $table->foreignId('unidade_id')->constrained();
            $table->enum('tipo', ["proprietario","inquilino"]);
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('morador_unidades');
    }
};
