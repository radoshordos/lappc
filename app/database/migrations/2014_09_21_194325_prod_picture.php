<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProdPicture extends Migration
{
	public function up()
	{
		Schema::create('prod_picture', function (Blueprint $table) {

			$table->increments('id')->unsigned();
			$table->integer('prod_id')->unsigned();
			$table->string('img_big', 80);
			$table->string('img_normal', 80);
			$table->string('img_snormal', 80);
			$table->string('img_small', 80);

			$table->engine = 'InnoDB';
			$table->foreign('prod_id')->references('id')->on('prod')->onUpdate('cascade')->onDelete('cascade');
		});

        DB::unprepared('DROP TRIGGER IF EXISTS prod_picture_ai');
        DB::unprepared('
            CREATE TRIGGER prod_picture_ai AFTER INSERT ON prod_picture
            FOR EACH ROW BEGIN
                DECLARE picture_count INT;
                SELECT COUNT(*) INTO picture_count FROM prod_picture WHERE NEW.prod_id = prod_picture.prod_id;
                UPDATE prod SET picture_count = picture_count WHERE prod.id = NEW.prod_id;
            END
        ');

        DB::unprepared('DROP TRIGGER IF EXISTS prod_picture_au');
        DB::unprepared('
            CREATE TRIGGER prod_picture_au AFTER UPDATE ON prod_picture
            FOR EACH ROW BEGIN
                DECLARE picture_count INT;
                SELECT COUNT(*) INTO picture_count FROM prod_picture WHERE NEW.prod_id = prod_picture.prod_id;
                UPDATE prod SET picture_count = picture_count WHERE prod.id = NEW.prod_id;
            END
        ');

        DB::unprepared('DROP TRIGGER IF EXISTS prod_picture_ad');
        DB::unprepared('
            CREATE TRIGGER prod_picture_ad AFTER DELETE ON prod_picture
            FOR EACH ROW BEGIN
                DECLARE picture_count INT;
                SELECT COUNT(*) INTO picture_count FROM prod_picture WHERE OLD.prod_id = prod_picture.prod_id;
                UPDATE prod SET picture_count = picture_count WHERE prod.id = OLD.prod_id;
            END
        ');
    }

	public function down()
	{
		Schema::dropIfExists('prod_picture');
	}
}