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
            $table->tinyInteger('forex_id')->unsigned()->default(1);
            $table->tinyInteger('dph_id')->unsigned()->default(21);
            $table->tinyInteger('ic_all')->unsigned()->default(0);
            $table->tinyInteger('ic_visible')->unsigned()->default(0);
	        $table->tinyInteger('ic_availability_diff_visible')->unsigned()->default(0);
	        $table->tinyInteger('ic_sale_diff_visible')->unsigned()->default(0);
	        $table->tinyInteger('ic_price_diff_visible')->unsigned()->default(0);

            $table->decimal('price', 9, 2)->unsigned();
            $table->string('alias', '64');
            $table->string('name', '64');
            $table->string('desc', '128');
            $table->float('transport_weight')->unsigned()->default(0.1);
            $table->boolean('transport_atypical')->default(0);
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
            $table->foreign('forex_id')->references('id')->on('forex')->onUpdate('cascade')->onDelete('no action');
        });

        DB::unprepared('DROP TRIGGER IF EXISTS tree_dev_ai');
        DB::unprepared('
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

				IF NEW.mode_id = 4 AND OLD.mode_id != 4
					THEN
						INSERT INTO akce (prod_id) VALUES (NEW.id);
				END IF;
				IF OLD.mode_id = 4 AND NEW.mode_id != 4
					THEN
						DELETE FROM akce WHERE prod_id = OLD.id;
				END IF;
            END
        ');

        DB::unprepared('DROP TRIGGER IF EXISTS tree_dev_ad');
        DB::unprepared('
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