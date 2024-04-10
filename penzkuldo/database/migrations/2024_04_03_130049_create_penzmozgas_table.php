<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('penzmozgas', function (Blueprint $table) {
            $table->primary(['kuldo_szamla', 'kuldes_idopont']);
            $table->foreignId('kuldo_szamla')->references('id')->on('szamlas');
            $table->foreignId('cimzett_szamla')->references('id')->on('szamlas');
            $table->integer('osszeg');
            $table->dateTime('kuldes_idopont');
            $table->timestamps();
        
        });

        DB::statement('ALTER TABLE penzmozgas ADD CONSTRAINT chk_osszeg_nagyobb_mint_nulla CHECK (osszeg > 0);');
        DB::statement('ALTER TABLE penzmozgas ADD CONSTRAINT chk_kuldo_nem_cimzett CHECK (kuldo_szamla != cimzett_szamla);');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penzmozgas');
    }
};
