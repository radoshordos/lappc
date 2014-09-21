<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Items extends Migration
{
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {

            $table->increments('id')->unsigned();
            $table->integer('prod_id')->unsigned();
            $table->tinyInteger('sale_id')->unsigned();
            $table->tinyInteger('availability_id')->unsigned();
            $table->boolean('visible')->default(1);
            $table->string('code_prod',32)->nullable();
            $table->string('code_ean',32)->nullable();
	        $table->decimal('iprice', 9, 2)->unsigned()->default(0);
            $table->timestamps();

            $table->engine = 'InnoDB';
            $table->unique('code_prod');
            $table->unique('code_ean');

            $table->foreign('sale_id')->references('id')->on('items_sale')->onUpdate('cascade')->onDelete('no action');
            $table->foreign('availability_id')->references('id')->on('items_availability')->onUpdate('cascade')->onDelete('no action');
            $table->foreign('prod_id')->references('id')->on('prod')->onUpdate('cascade')->onDelete('cascade');
        });

        DB::unprepared('DROP TRIGGER IF EXISTS items_ai');
        DB::unprepared('
            CREATE TRIGGER items_ai AFTER INSERT ON items
            FOR EACH ROW BEGIN

                DECLARE count_all INT;
                DECLARE count_visible INT;
				DECLARE count_price_diff_visible INT;

                SELECT COUNT(*) INTO count_all FROM items WHERE NEW.prod_id=items.prod_id;
                SELECT COUNT(*) INTO count_visible FROM items WHERE NEW.prod_id=items.prod_id AND visible = 1;
                SELECT COUNT(DISTINCT iprice) INTO count_price_diff_visible FROM items WHERE NEW.prod_id = items.prod_id AND visible = 1;

                UPDATE prod SET ic_all = count_all,
                                ic_visible = count_visible,
                                ic_price_diff_visible = count_price_diff_visible
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

                SELECT COUNT(*) INTO count_all FROM items WHERE NEW.prod_id=items.prod_id;
                SELECT COUNT(*) INTO count_visible FROM items WHERE NEW.prod_id=items.prod_id AND visible=1;
                SELECT COUNT(DISTINCT iprice) INTO count_price_diff_visible FROM items WHERE NEW.prod_id = items.prod_id AND visible = 1;

                UPDATE prod SET ic_all = count_all,
                                ic_visible = count_visible,
                                ic_price_diff_visible = count_price_diff_visible
                WHERE prod.id = NEW.prod_id;

            END
            ');

        DB::unprepared('DROP TRIGGER IF EXISTS items_ad');
        DB::unprepared('
            CREATE TRIGGER items_ad AFTER DELETE ON items
            FOR EACH ROW BEGIN

                DECLARE count_all INT;
                DECLARE count_visible INT;
                DECLARE count_price_diff_visible INT;

                SELECT COUNT(*) INTO count_all FROM items WHERE OLD.prod_id=items.prod_id;
                SELECT COUNT(*) INTO count_visible FROM items WHERE OLD.prod_id=items.prod_id AND visible=1;
                SELECT COUNT(DISTINCT iprice) INTO count_price_diff_visible FROM items WHERE OLD.prod_id = items.prod_id AND visible = 1;

                UPDATE prod SET ic_all = count_all,
                                ic_visible = count_visible,
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