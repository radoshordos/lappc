<?php

use Illuminate\Database\Migrations\Migration;

class AddProcedureTreeRecalculate extends Migration
{

    public function up()
    {

        DB::unprepared('
            CREATE PROCEDURE `tree_recalculate` ()
            BEGIN
            DEClARE ida,c INT;
            DECLARE done INT DEFAULT FALSE;
            DEClARE cur CURSOR FOR SELECT id FROM tree;
            DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

            OPEN cur;
            read_loop: LOOP

            FETCH cur INTO c;

            IF done THEN
            LEAVE read_loop;
            END IF;

            UPDATE tree SET deep = (
                SELECT
                CASE
                WHEN (c = 1)             THEN 0
                WHEN (MOD(c, 10000) = 0) THEN 1
                WHEN (MOD(c, 100) = 0)   THEN 2
                ELSE                          3
                END
            )
            WHERE id = c;


            END LOOP;
            CLOSE cur;
            END
        ');
    }

    public function down()
    {
        DB::unprepared('DROP PROCEDURE tree_recalculate');
    }

}
