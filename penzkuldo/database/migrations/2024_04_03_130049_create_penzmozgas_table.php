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
        Schema::create('penzmozgas', function (Blueprint $table) {
           
            $table->foreignId('kuldo_szamla')->references('id')->on('szamlas');
            $table->foreignId('cimzett_szamla')->references('id')->on('szamlas');
            $table->integer('osszeg');
            $table->text('kuldes_idopont')->nullable();
            $table->timestamps();
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penzmozgas');
    }
};
