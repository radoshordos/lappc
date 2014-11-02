<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Items extends Migration
{
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {

            $table->increments('id')->unsigned();
            $table->integer('prod_id')->unsigned();
            $table->tinyInteger('availability_id')->unsigned();
            $table->smallInteger('diff_val1_id')->unsigned()->default(1);
            $table->smallInteger('diff_val2_id')->unsigned()->default(1);
            $table->boolean('visible')->default(1);
            $table->string('code_prod', 32)->nullable()->unique();
            $table->string('code_ean', 32)->nullable()->unique();
            $table->timestamps();

            $table->engine = 'InnoDB';
            $table->unique(['prod_id','diff_val1_id','diff_val2_id']);

            $table->foreign('availability_id')->references('id')->on('items_availability')->onUpdate('cascade')->onDelete('no action');
            $table->foreign('prod_id')->references('id')->on('prod')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('diff_val1_id')->references('id')->on('prod_difference_values')->onUpdate('cascade')->onDelete('no action');
            $table->foreign('diff_val2_id')->references('id')->on('prod_difference_values')->onUpdate('cascade')->onDelete('no action');
        });

        DB::unprepared('DROP TRIGGER IF EXISTS items_ai');
        DB::unprepared('
            CREATE TRIGGER items_ai AFTER INSERT ON items
            FOR EACH ROW BEGIN

                DECLARE prod_mode_id INT;
                DECLARE prod_price INT;
                DECLARE akce_item_price INT;

                DECLARE count_all INT;
                DECLARE count_visible INT;
				DECLARE count_sale_diff_visible INT;
				DECLARE count_availability_diff_visible INT;
				DECLARE count_price_diff_visible INT;
				DECLARE items_action_price_sale_visible DOUBLE;
				DECLARE min_price_visible DOUBLE;

                SELECT prod.price INTO prod_price FROM prod WHERE prod.id = NEW.prod_id;
                SELECT prod.mode_id INTO prod_mode_id FROM prod WHERE prod.id = NEW.prod_id;

                SELECT COUNT(*) INTO count_all FROM items WHERE NEW.prod_id=items.prod_id;
                SELECT COUNT(*) INTO count_visible FROM items WHERE NEW.prod_id=items.prod_id AND visible = 1;
                SELECT COUNT(DISTINCT availability_id) INTO count_availability_diff_visible FROM items WHERE NEW.prod_id = items.prod_id AND visible = 1;

                UPDATE prod SET ic_all = count_all,
                                ic_visible = count_visible,
                                ic_sale_diff_visible = count_sale_diff_visible,
                                ic_availability_diff_visible = count_availability_diff_visible
                WHERE prod.id = NEW.prod_id;
            END
            ');

        DB::unprepared('DROP TRIGGER IF EXISTS items_au');
        DB::unprepared('
            CREATE TRIGGER items_au AFTER UPDATE ON items
            FOR EACH ROW BEGIN

                DECLARE count_all INT;
                DECLARE count_visible INT;
                DECLARE count_price_diff_visible INT;
				DECLARE count_sale_diff_visible INT;
				DECLARE count_availability_diff_visible INT;

                SELECT COUNT(*) INTO count_all FROM items WHERE NEW.prod_id=items.prod_id;
                SELECT COUNT(*) INTO count_visible FROM items WHERE NEW.prod_id=items.prod_id AND visible=1;
                SELECT COUNT(DISTINCT availability_id) INTO count_availability_diff_visible FROM items WHERE NEW.prod_id = items.prod_id AND visible = 1;

                UPDATE prod SET ic_all = count_all,
                                ic_visible = count_visible,
                                ic_sale_diff_visible = count_sale_diff_visible,
                                ic_availability_diff_visible = count_availability_diff_visible,
								ic_price_diff_visible = count_price_diff_visible
                WHERE prod.id = OLD.prod_id;
            END
            ');

        DB::unprepared('DROP TRIGGER IF EXISTS items_ad');
        DB::unprepared('
            CREATE TRIGGER items_ad AFTER DELETE ON items
            FOR EACH ROW BEGIN

                DECLARE count_all INT;
                DECLARE count_visible INT;
                DECLARE count_price_diff_visible INT;
				DECLARE count_sale_diff_visible INT;
				DECLARE count_availability_diff_visible INT;

                SELECT COUNT(*) INTO count_all FROM items WHERE OLD.prod_id=items.prod_id;
                SELECT COUNT(*) INTO count_visible FROM items WHERE OLD.prod_id=items.prod_id AND visible=1;
                SELECT COUNT(DISTINCT availability_id) INTO count_availability_diff_visible FROM items WHERE OLD.prod_id = items.prod_id AND visible = 1;

                UPDATE prod SET ic_all = count_all,
                                ic_visible = count_visible,
                                ic_sale_diff_visible = count_sale_diff_visible,
                                ic_availability_diff_visible = count_availability_diff_visible,
								ic_price_diff_visible = count_price_diff_visible
                WHERE prod.id = OLD.prod_id;

            END
            ');
    }

    public function down()
    {
        Schema::dropIfExists('items');

        DB::unprepared('DROP TRIGGER IF EXISTS items_ai');
        DB::unprepared('DROP TRIGGER IF EXISTS items_au');
        DB::unprepared('DROP TRIGGER IF EXISTS items_ad');
    }
}