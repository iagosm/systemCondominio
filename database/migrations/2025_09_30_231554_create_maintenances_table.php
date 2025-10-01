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

        Schema::create('maintenances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('space_id')->constrained();
            $table->enum('type', ["preventiva","corretiva"]);
            $table->foreignId('responsible_id')->constrained();
            $table->text('description');
            $table->dateTime('planned_date');
            $table->dateTime('completed_date')->nullable();
            $table->enum('status', ["pendente","em_andamento","concluida"]);
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
        Schema::dropIfExists('maintenances');
    }
};
