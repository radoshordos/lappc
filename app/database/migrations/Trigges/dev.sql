/********************* INSERT ******************/

CREATE TRIGGER `dev_ai` AFTER INSERT ON `dev` FOR EACH ROW
BEGIN

DECLARE dev_desc VARCHAR(256);

SELECT GROUP_CONCAT(" ",dev.name)
INTO dev_desc
FROM dev_m2n_group
INNER JOIN dev ON dev_m2n_group.dev_id = dev.id
WHERE dev_m2n_group.group_id = NEW.id
ORDER BY dev.id;

UPDATE dev_group
SET dev_group.desc = dev_desc
WHERE dev_group.id=NEW.id;

END;


/********************* UPDATE ******************/


CREATE TRIGGER `dev_au` AFTER UPDATE ON `dev` FOR EACH ROW
BEGIN

DECLARE dev_desc VARCHAR(256);

SELECT GROUP_CONCAT(" ",dev.name)
INTO dev_desc
FROM dev_m2n_group
INNER JOIN dev ON dev_m2n_group.dev_id = dev.id
WHERE dev_m2n_group.group_id = NEW.id
ORDER BY dev.id;

UPDATE dev_group
SET dev_group.desc = dev_desc
WHERE dev_group.id=NEW.id;

END;

<?php

use Illuminate\Database\Migrations\Migration;

class AddTriggerDev extends Migration
{

    public function up()
    {
/*
        DB::unprepared('CREATE TRIGGER `dev_ai` AFTER INSERT ON `dev` FOR EACH ROW
                        BEGIN


  WHERE dev_id = NEW.id;
                        UPDATE dev_group
                        SET dev_group.desc = (
                                                SELECT GROUP_CONCAT(" ",dev.name)
                                                FROM dev
                                                INNER JOIN dev_m2n_group ON dev_m2n_group.dev_id = dev.id
                                                WHERE dev_m2n_group.group_id IN (SELECT group_id FROM dev_m2n_group WHERE dev_id = NEW.id)
                                                ORDER BY dev.id
                                             );

                        END;
        ');
*/
        DB::unprepared('CREATE TRIGGER `dev_au` AFTER UPDATE ON `dev` FOR EACH ROW
                        BEGIN

                        DECLARE count INT;
                        DECLARE grupa INT;
                        DECLARE my_cursor CURSOR FOR SELECT group_id FROM dev_m2n_group;

                        SELECT group_id INTO count FROM dev_m2n_group;

                        OPEN my_cursor;

                        WHILE count > 0 DO
                            FETCH my_cursor INTO group;

                            UPDATE dev_group
                            SET dev_group.desc = (
                                                    SELECT GROUP_CONCAT(" ",dev.name)
                                                    FROM dev
                                                    INNER JOIN dev_m2n_group ON dev_m2n_group.dev_id = dev.id
                                                    WHERE dev_m2n_group.group_id = grupa
                                                    ORDER BY dev.id
                                                 );
                            WHERE dev_group.id = grupa;

                            SET count = count - 1;
                        END WHILE;
                        CLOSE my_cursor;
                        END;
        ');
/*
        DB::unprepared('CREATE TRIGGER `dev_ad` AFTER DELETE ON `dev` FOR EACH ROW
                        BEGIN

                        DECLARE dtext VARCHAR(256);

                        SELECT GROUP_CONCAT(" ",dev.name)
                        INTO dtext
                        FROM dev
                        INNER JOIN dev_m2n_group ON dev_m2n_group.dev_id = dev.id
                        WHERE dev_m2n_group.group_id = OLD.id
                        ORDER BY dev.id;

                        UPDATE dev_group SET dev_group.desc = dtext WHERE dev_group.id=OLD.id;

                        END;;
        ');
*/
    }

    public function down()
    {
    }
}