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
        Schema::create('user_eliminados', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('tipo_cambio');
            $table->string('usuario');
            $table->string('usuario_objetivo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_eliminados');
    }
};
