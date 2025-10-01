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

        Schema::create('cleanings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('space_id')->constrained();
            $table->foreignId('responsible_id')->constrained();
            $table->dateTime('date');
            $table->enum('status', ["pendente","concluida","em_andamento"]);
            $table->foreignId('responsible_id_id');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cleanings');
    }
};
