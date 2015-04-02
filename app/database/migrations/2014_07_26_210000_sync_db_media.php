<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SyncDbMedia extends Migration
{
	public function up()
	{
		Schema::create('sync_db_media', function (Blueprint $table) {
			$table->increments('id')->unsigned();
			$table->integer('sync_id')->unsigned();
            $table->smallInteger('media_variations_id')->unsigned();            
			$table->string('data', '255');
			$table->engine = 'InnoDB';

            $table->foreign('sync_id')->references('id')->on('sync_db')->onUpdate('cascade')->onDelete('cascade');            
            $table->foreign('media_variations_id')->references('id')->on('media_variations')->onUpdate('cascade')->onDelete('no action');
		});

        DB::unprepared('DROP TRIGGER IF EXISTS sync_db_media_ai');
        DB::unprepared('
            CREATE TRIGGER `sync_db_media_ai` AFTER INSERT ON `sync_db_media` FOR EACH ROW
            BEGIN
                UPDATE sync_db
                SET count_media = (SELECT COUNT(*) FROM sync_db_media WHERE NEW.sync_id = sync_db_media.sync_id)
                WHERE NEW.sync_id = sync_db.id;
            END
        ');

        DB::unprepared('DROP TRIGGER IF EXISTS sync_db_media_au');
        DB::unprepared('
            CREATE TRIGGER `sync_db_media_au` AFTER UPDATE ON `sync_db_media` FOR EACH ROW
            BEGIN
                UPDATE  sync_db
                SET count_media = (SELECT COUNT(*) FROM sync_db_media WHERE NEW.sync_id = sync_db_media.sync_id)
                WHERE NEW.sync_id = sync_db.id;
            END
        ');

        DB::unprepared('DROP TRIGGER IF EXISTS sync_db_media_ad');
        DB::unprepared('
            CREATE TRIGGER `sync_db_media_ad` AFTER DELETE ON `sync_db_media` FOR EACH ROW
            BEGIN
                UPDATE sync_db
                SET count_media = (SELECT COUNT(*) FROM sync_db_media WHERE OLD.sync_id = sync_db_media.sync_id)
                WHERE OLD.sync_id = sync_db.id;
            END
        ');
	}

	public function down()
	{
		Schema::dropIfExists('sync_db_media');
	}
}