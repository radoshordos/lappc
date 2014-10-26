<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class MixtureDevM2nDev extends Migration
{

    public function up()
    {
        Schema::create('mixture_dev_m2n_dev', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('mixture_dev_id')->unsigned();
            $table->integer('dev_id')->unsigned();

            $table->engine = 'InnoDB';

            $table->foreign('mixture_dev_id')->references('id')->on('mixture_dev')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('dev_id')->references('id')->on('dev')->onUpdate('cascade')->onDelete('cascade');
        });

        DB::unprepared('DROP TRIGGER IF EXISTS mixture_dev_m2n_dev_ai');
        DB::unprepared('
            CREATE TRIGGER mixture_dev_m2n_dev_ai
            AFTER INSERT ON mixture_dev_m2n_dev FOR EACH ROW
            BEGIN
                UPDATE mixture_dev
                SET trigger_column_count =
                    (
                        SELECT COUNT(*)
                        FROM mixture_dev_m2n_dev
                        WHERE mixture_dev_id = NEW.mixture_dev_id
                    )
                WHERE mixture_dev.id = NEW.mixture_dev_id;
            END
        ');

        DB::unprepared('DROP TRIGGER IF EXISTS mixture_dev_m2n_dev_au');
        DB::unprepared('
            CREATE TRIGGER mixture_dev_m2n_dev_au
            AFTER UPDATE ON mixture_dev_m2n_dev FOR EACH ROW
            BEGIN
                UPDATE mixture_dev
                SET trigger_column_count =
                    (
                        SELECT COUNT(*)
                        FROM mixture_dev_m2n_dev
                        WHERE mixture_dev_id = NEW.mixture_dev_id
                    )
                WHERE mixture_dev.id = NEW.mixture_dev_id;
            END
        ');

        DB::unprepared('DROP TRIGGER IF EXISTS mixture_dev_m2n_dev_ad');
        DB::unprepared('
            CREATE TRIGGER mixture_dev_m2n_dev_ad
            AFTER DELETE ON mixture_dev_m2n_dev FOR EACH ROW
            BEGIN
                UPDATE mixture_dev
                SET trigger_column_count =
                    (
                        SELECT COUNT(*)
                        FROM mixture_dev_m2n_dev
                        WHERE mixture_dev_id = OLD.mixture_dev_id
                    )
                WHERE mixture_dev.id = OLD.mixture_dev_id;
            END
        ');
    }

    public function down()
    {
        Schema::dropIfExists('mixture_dev_m2n_dev', function (Blueprint $table) {
            $table->dropForeign('group_id');
            $table->dropForeign('dev_id');
        });
    }

}