<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('musicas', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('nome');
            $table->string('banda');
            $table->string('genero');
            $table->decimal('valor', 8,2)->nullable();
            $table->string('musica');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::table('musicas', function (Blueprint $table) {
            $table->dropColumn('musica');
        });
    }
};
