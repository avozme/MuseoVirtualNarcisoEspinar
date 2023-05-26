<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE FUNCTION strip_tags(str text) 
        RETURNS text
        DETERMINISTIC
        BEGIN
            DECLARE start, end INT DEFAULT 1;
            LOOP
                SET start = LOCATE("<", str, start);
                IF (!start) THEN RETURN REPLACE(str, "&nbsp;", ""); END IF;
                SET end = LOCATE(">", str, start);
                IF (!end) THEN SET end = start; END IF;
                SET str = INSERT(str, start, end - start + 1, "");
                SET str = REPLACE(str, "&nbsp;", "");
            END LOOP;
        END'
    );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP FUNCTION IF EXISTS strip_tags');

    }
};
