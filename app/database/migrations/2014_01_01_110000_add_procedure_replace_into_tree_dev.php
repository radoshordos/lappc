<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProcedureReplaceIntoTreeDev extends Migration {

	public function up()
	{
        DB::unprepared('DROP PROCEDURE IF EXISTS proc_replase_tree_dev');
        DB::unprepared('
            CREATE PROCEDURE proc_replase_tree_dev(IN tree_id INT(10) UNSIGNED, dev_id INT(10) UNSIGNED)
            BEGIN

                SET @xTree  = tree_id;
                SET @xDev   = dev_id;

                REPLACE INTO tree_dev SET
                    tree_id     = @xTree,
                    dev_id      = 1,
                    dir_all     = (fce_select_beetwen(@xTree,1)),
                    dir_visible = (fce_select_beetwen_visible(@xTree,1)),
                    subdir_all  = (
                        SELECT
                            CASE
                                WHEN (MOD(@xTree, 10000) = 0)
                                    THEN (fce_select_beetwen(@xTree,10000))
                                WHEN (MOD(@xTree, 100)   = 0)
                                    THEN (fce_select_beetwen(@xTree,100))
                                ELSE     (fce_select_beetwen(@xTree,1))
                                END
                        ),
                    subdir_visible = (
                        SELECT
                            CASE
                                WHEN (MOD(@xTree, 10000) = 0)
                                    THEN (fce_select_beetwen_visible(@xTree,10000))
                                WHEN (MOD(@xTree, 100)   = 0)
                                    THEN (fce_select_beetwen_visible(@xTree,100))
                                ELSE     (fce_select_beetwen_visible(@xTree,1))
                            END
                        );

                REPLACE INTO tree_dev SET
                    tree_id     = @xTree,
                    dev_id      = @xDev,
                    dir_all     = (fce_select_beetwen_with_dev(@xTree,@xDev,1)),
                    dir_visible = (fce_select_beetwen_with_dev_visible(@xTree,@xDev,1)),
                    subdir_all  = (
                    SELECT
                        CASE
                            WHEN (MOD(@xTree, 10000) = 0)
                                THEN (fce_select_beetwen_with_dev(@xTree,@xDev,10000))
                            WHEN (MOD(@xTree, 100)   = 0)
                                THEN (fce_select_beetwen_with_dev(@xTree,@xDev,100))
                            ELSE     (fce_select_beetwen_with_dev(@xTree,@xDev,1))
                        END
                    ),
                    subdir_visible = (
                    SELECT
                        CASE
                            WHEN (MOD(@xTree, 10000) = 0)
                                THEN (fce_select_beetwen_with_dev_visible(@xTree,@xDev,10000))
                            WHEN (MOD(@xTree, 100)   = 0)
                                THEN (fce_select_beetwen_with_dev_visible(@xTree,@xDev,100))
                            ELSE     (fce_select_beetwen_with_dev_visible(@xTree,@xDev,1))
                        END
                );

            END
        ');

        DB::unprepared('DROP FUNCTION IF EXISTS fce_select_beetwen');
        DB::unprepared('
            CREATE FUNCTION fce_select_beetwen(xTree INT(10) UNSIGNED, rangex INT(10) UNSIGNED) RETURNS INT(10) unsigned
            DETERMINISTIC
            BEGIN

                DECLARE run INT(10) UNSIGNED DEFAULT 0;

                IF (rangex) = 1 THEN
                    SELECT COUNT(*) INTO run
                    FROM prod
                    WHERE tree_id = xTree;
                ELSE
                     SELECT COUNT(*) INTO run
                     FROM prod
                     WHERE tree_id >= (xTree - MOD(xTree, rangex))
                     AND   tree_id <  (xTree - MOD(xTree, rangex)) + rangex;
                END IF;

                RETURN run;

            END
        ');

        DB::unprepared('DROP FUNCTION IF EXISTS fce_select_beetwen_visible');
        DB::unprepared('
            CREATE FUNCTION fce_select_beetwen_visible(xTree INT(10) UNSIGNED, rangex INT(10) UNSIGNED) RETURNS INT(10) unsigned
            DETERMINISTIC
            BEGIN

                DECLARE run INT(10) UNSIGNED DEFAULT 0;

                IF (rangex) = 1 THEN
                    SELECT COUNT(*) INTO run
                    FROM prod
                    WHERE  tree_id = xTree
                    AND mode_id > 1;
                ELSE
                    SELECT COUNT(*) INTO run
                    FROM prod
                    WHERE   tree_id >= (xTree - MOD(xTree, rangex))
                    AND     tree_id <  (xTree - MOD(xTree, rangex)) + rangex
                    AND     mode_id > 1;
                END IF;

                RETURN run;
            END
        ');

        DB::unprepared('DROP FUNCTION IF EXISTS fce_select_beetwen_with_dev');
        DB::unprepared('
            CREATE FUNCTION fce_select_beetwen_with_dev(xTree INT(10) UNSIGNED, xDev INT(10) UNSIGNED, rangex INT(10) UNSIGNED) RETURNS INT(10) unsigned
            DETERMINISTIC
            BEGIN

                DECLARE run INT(10) UNSIGNED DEFAULT 0;

                IF (rangex) = 1 THEN
                    SELECT COUNT(*) INTO run
                    FROM prod
                    WHERE   dev_id  = xDev
                    AND     tree_id = xTree;
                ELSE
                    SELECT COUNT(*)  INTO run
                    FROM prod
                    WHERE   dev_id   = xDev
                    AND     tree_id >= (xTree - MOD(xTree, rangex))
                    AND     tree_id <  (xTree - MOD(xTree, rangex)) + rangex;
                END IF;

                RETURN run;
            END
        ');

        DB::unprepared('DROP FUNCTION IF EXISTS fce_select_beetwen_with_dev_visible');
        DB::unprepared('
            CREATE FUNCTION fce_select_beetwen_with_dev_visible(xTree INT(10) UNSIGNED, xDev INT(10) UNSIGNED, rangex INT(10) UNSIGNED) RETURNS INT(10) unsigned
            DETERMINISTIC
            BEGIN

                DECLARE run INT(10) UNSIGNED DEFAULT 0;

                IF (rangex) = 1 THEN
                    SELECT COUNT(*) INTO run
                    FROM prod
                    WHERE   dev_id  = xDev
                    AND     tree_id = xTree
                    AND     mode_id > 1;
                ELSE
                    SELECT COUNT(*)  INTO run
                    FROM prod
                    WHERE   dev_id   =  xDev
                    AND     tree_id >= (xTree - MOD(xTree, rangex))
                    AND     tree_id <  (xTree - MOD(xTree, rangex)) + rangex
                    AND     mode_id > 1;
                END IF;

                RETURN run;
            END
        ');
	}

	public function down() {
        DB::unprepared('DROP PROCEDURE proc_replase_tree_dev');
        DB::unprepared('DROP FUNCTION fce_select_beetwen');
        DB::unprepared('DROP FUNCTION fce_select_beetwen_visible');
        DB::unprepared('DROP FUNCTION fce_select_beetwen_with_dev');
        DB::unprepared('DROP FUNCTION fce_select_beetwen_with_dev_visible');
	}
}
