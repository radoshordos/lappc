<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SyncDbAccessory extends Migration
{

    public function up()
    {
        Schema::create('sync_db_accessory', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('sync_id')->unsigned();
            $table->string('connection', '255');
            $table->engine = 'InnoDB';

            $table->foreign('sync_id')->references('id')->on('sync_db')->onUpdate('cascade')->onDelete('cascade');
        });

        DB::unprepared('DROP TRIGGER IF EXISTS sync_db_accessory_ai');
        DB::unprepared('
            CREATE TRIGGER `sync_db_accessory_ai` AFTER INSERT ON `sync_db_accessory` FOR EACH ROW
            BEGIN
                UPDATE sync_db
                SET count_accessory = (SELECT COUNT(*) FROM sync_db_accessory WHERE NEW.sync_id = sync_db_accessory.sync_id)
                WHERE NEW.sync_id = sync_db.id;
            END
        ');

        DB::unprepared('DROP TRIGGER IF EXISTS sync_db_accessory_au');
        DB::unprepared('
            CREATE TRIGGER `sync_db_accessory_au` AFTER UPDATE ON `sync_db_accessory` FOR EACH ROW
            BEGIN
                UPDATE  sync_db
                SET count_accessory = (SELECT COUNT(*) FROM sync_db_accessory WHERE NEW.sync_id = sync_db_accessory.sync_id)
                WHERE NEW.sync_id = sync_db.id;
            END
        ');

        DB::unprepared('DROP TRIGGER IF EXISTS sync_db_accessory_ad');
        DB::unprepared('
            CREATE TRIGGER `sync_db_accessory_ad` AFTER DELETE ON `sync_db_accessory` FOR EACH ROW
            BEGIN
                UPDATE sync_db
                SET count_accessory = (SELECT COUNT(*) FROM sync_db_accessory WHERE OLD.sync_id = sync_db_accessory.sync_id)
                WHERE OLD.sync_id = sync_db.id;
            END
        ');
    }

    public function down()
    {
        Schema::dropIfExists('sync_db_accessory');
    }
}
