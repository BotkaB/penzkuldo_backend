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
        DB::unprepared(
            "
        CREATE TRIGGER trg_szamla_torlese
        BEFORE Delete ON szamlas
        FOR EACH ROW
        BEGIN
            IF OLD.egyenleg >0 THEN
                SIGNAL SQLSTATE '45000'
              
                    SET MESSAGE_TEXT = 'csak 0 egyenlegű számla törölhető.';
            END IF;
        END;"
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared(
            'drop trigger trg_szamla_torlese
           '
        );
    }
};
