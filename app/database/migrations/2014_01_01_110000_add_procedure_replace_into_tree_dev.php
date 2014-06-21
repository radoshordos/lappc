<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProcedureReplaceIntoTreeDev extends Migration {

	public function up()
	{
        DB::unprepared('
            CREATE PROCEDURE replase_into_tree_dev`(IN tree_id INT(10) UNSIGNED, dev_id INT(10) UNSIGNED)
            BEGIN

                SET @xTree  = tree_id;
                SET @xDev   = dev_id;

                REPLACE INTO tree2dev SET
                    tree_id     = @xTree,
                    dev_id      = 0,
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

                REPLACE INTO tree2dev SET
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
	}

	public function down() {
        DB::unprepared('DROP PROCEDURE replase_into_tree_dev');
	}
}
