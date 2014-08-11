<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Prod extends Migration
{

    public function up()
    {
        Schema::create('prod', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('tree_id')->unsigned();
            $table->integer('dev_id')->unsigned();
            $table->tinyInteger('mode_id')->unsigned()->default(3);
            $table->tinyInteger('warranty_id')->unsigned()->default(1);
            $table->tinyInteger('dph_id')->unsigned();
            $table->decimal('price', 9, 2)->unsigned();
            $table->string('alias', '64');
            $table->string('name', '64');
            $table->string('desc', '128');
            $table->timestamps();

            $table->engine = 'InnoDB';
            $table->unique('alias');
            $table->unique('name');
            $table->unique('desc');

            $table->foreign('tree_id')->references('id')->on('tree')->onUpdate('cascade')->onDelete('no action');
            $table->foreign('dev_id')->references('id')->on('dev')->onUpdate('cascade')->onDelete('no action');
            $table->foreign('warranty_id')->references('id')->on('prod_warranty')->onUpdate('cascade')->onDelete('no action');
            $table->foreign('mode_id')->references('id')->on('prod_mode')->onUpdate('cascade')->onDelete('no action');
            $table->foreign('dph_id')->references('id')->on('dph')->onUpdate('cascade')->onDelete('no action');
        });

        DB::unprepared('DROP TRIGGER IF EXISTS tree_dev_ai');
        DB::unprepared('
            DROP TRIGGER IF EXISTS tree_dev_ai;
            CREATE TRIGGER tree_dev_ai AFTER INSERT ON prod
            FOR EACH ROW BEGIN

                SET @ng1     = NEW.tree_id;
                SET @ng100   = (FLOOR(NEW.tree_id / 100))*100;
                SET @ng10000 = (FLOOR(NEW.tree_id / 10000))*10000;

                CASE
                    WHEN (MOD(@ng1, 10000) = 0)
                         THEN
                               CALL proc_replase_tree_dev(@ng10000,NEW.dev_id);
                    WHEN (MOD(@ng1, 100)   = 0)
                         THEN
                               CALL proc_replase_tree_dev(@ng100,NEW.dev_id);
                               CALL proc_replase_tree_dev(@ng10000,NEW.dev_id);
                         ELSE
                               CALL proc_replase_tree_dev(@ng1,NEW.dev_id);
                               CALL proc_replase_tree_dev(@ng100,NEW.dev_id);
                               CALL proc_replase_tree_dev(@ng10000,NEW.dev_id);
                END CASE;
            END
        ');

        DB::unprepared('DROP TRIGGER IF EXISTS tree_dev_au');
        DB::unprepared('
            DROP TRIGGER IF EXISTS tree_dev_au;
            CREATE TRIGGER tree_dev_au AFTER UPDATE ON prod
            FOR EACH ROW BEGIN
            
                SET @ng1     = NEW.tree_id;
                SET @ng100   = (FLOOR(NEW.tree_id / 100))*100;
                SET @ng10000 = (FLOOR(NEW.tree_id / 10000))*10000;
            
                SET @og1     = OLD.tree_id;
                SET @og100   = (FLOOR(OLD.tree_id / 100))*100;
                SET @og10000 = (FLOOR(OLD.tree_id / 10000))*10000;
            
                CASE
                    WHEN (MOD(@ng1, 10000) = 0)
                          THEN
                                CALL proc_replase_tree_dev(@ng10000,NEW.dev_id);
                    WHEN (MOD(@ng1, 100)   = 0)
                          THEN 
                                CALL proc_replase_tree_dev(@ng100,NEW.dev_id);
                                CALL proc_replase_tree_dev(@ng10000,NEW.dev_id);
                          ELSE   
                                CALL proc_replase_tree_dev(@ng1,NEW.dev_id);
                                CALL proc_replase_tree_dev(@ng100,NEW.dev_id);
                                CALL proc_replase_tree_dev(@ng10000,NEW.dev_id);
                END CASE;
            
                CASE
                    WHEN (MOD(@og1, 10000) = 0)
                          THEN
                                CALL proc_replase_tree_dev(@og10000,OLD.dev_id);
                    WHEN (MOD(@og1, 100)   = 0)
                          THEN 
                                CALL proc_replase_tree_dev(@og100,OLD.dev_id);
                                CALL proc_replase_tree_dev(@og10000,OLD.dev_id);
                          ELSE   
                                CALL proc_replase_tree_dev(@og1,OLD.dev_id);
                                CALL proc_replase_tree_dev(@og100,OLD.dev_id);
                                CALL proc_replase_tree_dev(@og10000,OLD.dev_id);
                END CASE;
            END
        ');

        DB::unprepared('DROP TRIGGER IF EXISTS tree_dev_ad');
        DB::unprepared('
            DROP TRIGGER IF EXISTS tree_dev_ad;
            CREATE TRIGGER tree_dev_ad AFTER DELETE ON prod
            FOR EACH ROW BEGIN
            
                SET @og1     = OLD.tree_id;
                SET @og100   = (FLOOR(OLD.tree_id / 100))*100;
                SET @og10000 = (FLOOR(OLD.tree_id / 10000))*10000;
            
                CASE 
                    WHEN (MOD(@og1, 10000) = 0)
                          THEN
                                CALL proc_replase_tree_dev(@og10000,OLD.dev_id);
                    WHEN (MOD(@og1, 100)   = 0)
                          THEN 
                                CALL proc_replase_tree_dev(@og100,OLD.dev_id);
                                CALL proc_replase_tree_dev(@og10000,OLD.dev_id);
                          ELSE   
                                CALL proc_replase_tree_dev(@og1,OLD.dev_id);
                                CALL proc_replase_tree_dev(@og100,OLD.dev_id);
                                CALL proc_replase_tree_dev(@og10000,OLD.dev_id);
                END CASE;
                DELETE FROM tree_dev WHERE subdir_all = 0;
            END
        ');
    }

    public function down()
    {
        Schema::dropIfExists('prod', function (Blueprint $table) {
            $table->dropForeign('tree_id');
            $table->dropForeign('dev_id');
            $table->dropForeign('warranty_id');
        });


        DB::unprepared('DROP TRIGGER IF EXISTS tree_dev_ai');
        DB::unprepared('DROP TRIGGER IF EXISTS tree_dev_au');
        DB::unprepared('DROP TRIGGER IF EXISTS tree_dev_ad');
    }
}