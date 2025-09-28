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

        Schema::create('unidades', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->enum('tipo', ["apartamento","loft","casa","vila"]);
            $table->string('bloco');
            $table->foreignId('proprietario_id')->constrained();
            $table->foreignId('proprietario_id_id');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unidades');
    }
};
