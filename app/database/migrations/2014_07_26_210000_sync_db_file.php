<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SyncDbFile extends Migration
{
	public function up()
	{
		Schema::create('sync_db_file', function (Blueprint $table) {
			$table->increments('id')->unsigned();
			$table->integer('sync_id')->unsigned();
			$table->string('url', '255');
			$table->engine = 'InnoDB';

			$table->foreign('sync_id')->references('id')->on('sync_db')->onUpdate('cascade')->onDelete('cascade');
		});

        DB::unprepared('DROP TRIGGER IF EXISTS sync_db_file_ai');
        DB::unprepared('
            CREATE TRIGGER `sync_db_file_ai` AFTER INSERT ON `sync_db_file` FOR EACH ROW
            BEGIN
                UPDATE sync_db
                SET count_file = (SELECT COUNT(*) FROM sync_db_file WHERE NEW.sync_id = sync_db_file.sync_id)
                WHERE NEW.sync_id = sync_db.id;
            END
        ');

        DB::unprepared('DROP TRIGGER IF EXISTS sync_db_file_au');
        DB::unprepared('
            CREATE TRIGGER `sync_db_file_au` AFTER UPDATE ON `sync_db_file` FOR EACH ROW
            BEGIN
                UPDATE  sync_db
                SET count_file = (SELECT COUNT(*) FROM sync_db_file WHERE NEW.sync_id = sync_db_file.sync_id)
                WHERE NEW.sync_id = sync_db.id;
            END
        ');

        DB::unprepared('DROP TRIGGER IF EXISTS sync_db_file_ad');
        DB::unprepared('
            CREATE TRIGGER `sync_db_file_ad` AFTER DELETE ON `sync_db_file` FOR EACH ROW
            BEGIN
                UPDATE sync_db
                SET count_file = (SELECT COUNT(*) FROM sync_db_file WHERE OLD.sync_id = sync_db_file.sync_id)
                WHERE OLD.sync_id = sync_db.id;
            END
        ');
	}

	public function down()
	{
		Schema::dropIfExists('sync_db_file');
	}
}