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

        Schema::create('movimentacao_garagems', function (Blueprint $table) {
            $table->id();
            $table->foreignId('veiculo_id')->constrained();
            $table->dateTime('entrada');
            $table->dateTime('saida')->nullable();
            $table->enum('tipo', ["visitante","permanente"]);
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movimentacao_garagems');
    }
};
