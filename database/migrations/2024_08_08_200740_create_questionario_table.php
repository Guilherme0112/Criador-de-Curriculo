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
        Schema::create('questionarios', function (Blueprint $table) {
            $table->id();
            $table->string('idUser');
            $table->text('nome');
            $table->text('email');
            $table->text('telefone');
            $table->text('experiencias');
            $table->text('habilidades');
            $table->text('formacoes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questionarios');
    }
};
