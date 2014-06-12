<?php

use Illuminate\Database\Migrations\Migration;

class AddTriggerDev extends Migration
{

    public function up()
    {
        DB::unprepared('CREATE TRIGGER `dev_ai` AFTER INSERT ON `dev` FOR EACH ROW
                        BEGIN

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

        DB::unprepared('CREATE TRIGGER `dev_au` AFTER UPDATE ON `dev` FOR EACH ROW
                        BEGIN

                        UPDATE dev_group
                        SET dev_group.desc = (
                                                SELECT GROUP_CONCAT(" ",dev.name)
                                                FROM dev
                                                INNER JOIN dev_m2n_group ON dev_m2n_group.dev_id = dev.id
                                                WHERE dev_m2n_group.group_id IN (SELECT group_id FROM dev_m2n_group WHERE dev_id = NEW.id)
                                                ORDER BY dev.id
                                             );
                        WHERE (SELECT group_id FROM dev_m2n_group WHERE dev_id = NEW.id)



                        END;
        ');

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
    }

    public function down()
    {
    }
}