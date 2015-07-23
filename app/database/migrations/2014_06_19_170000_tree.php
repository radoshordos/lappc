<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Tree extends Migration
{
    public function up()
    {
        Schema::create('tree', function (Blueprint $table) {
            $table->integer('id')->unsigned();
            $table->integer('parent_id')->unsigned();
            $table->tinyInteger('group_id')->unsigned();
            $table->tinyInteger('position')->unsigned();
            $table->tinyInteger('deep')->unsigned()->nulable();
            $table->string('name','40');
            $table->string('desc','80');
            $table->string('relative','64');
            $table->string('absolute','256')->nulable();
            $table->string('category_text','256')->nulable();
            $table->string('category_nav','512')->nulable();
            $table->string('category_menu','4096')->nulable();
            $table->string('picture','40')->default('!.jpg')->nulable();
            $table->timestamps();

            $table->engine = 'InnoDB';
            $table->primary('id');

            $table->foreign('parent_id')->references('id')->on('tree')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('group_id')->references('id')->on('tree_group')->onUpdate('cascade')->onDelete('no action');
        });

        DB::unprepared('DROP PROCEDURE IF EXISTS proc_tree_recalculate');
        DB::unprepared('
            CREATE PROCEDURE proc_tree_recalculate ()
            BEGIN
            DECLARE done INT DEFAULT FALSE;
            DECLARE c INT;
            DEClARE cur CURSOR FOR SELECT id FROM tree;
            DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

            OPEN cur;
            read_loop: LOOP

            FETCH cur INTO c;

            IF done THEN
            LEAVE read_loop;
            END IF;

            UPDATE tree SET
                deep = (
                    SELECT
                    CASE
                    WHEN (MOD(c, 1000000) = 0)  THEN 0
                    WHEN (MOD(c, 10000) = 0)    THEN 1
                    WHEN (MOD(c, 100) = 0)      THEN 2
                    ELSE                             3
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
        Schema::dropIfExists('tree', function (Blueprint $table) {
            $table->dropForeign('parent_id');
            $table->dropForeign('group_id');
        });

        DB::unprepared('DROP PROCEDURE IF EXISTS proc_tree_recalculate');
    }

}