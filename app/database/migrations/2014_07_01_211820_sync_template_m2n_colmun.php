<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SyncTemplateM2nColmun extends Migration
{

    public function up()
    {
        Schema::create('sync_template_m2n_colmun', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('template_id')->unsigned();
            $table->tinyInteger('column_id')->unsigned();

            $table->engine = 'InnoDB';

            $table->foreign('template_id')->references('id')->on('sync_csv_template')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('column_id')->references('id')->on('sync_csv_column')->onUpdate('cascade')->onDelete('cascade');
        });

        DB::unprepared('DROP TRIGGER IF EXISTS sync_template_m2n_colmun_ai');
        DB::unprepared('
            CREATE TRIGGER sync_template_m2n_colmun_ai
            AFTER INSERT ON sync_template_m2n_colmun FOR EACH ROW
            BEGIN
                UPDATE sync_csv_template
                SET trigger_column_count =
                    (
                        SELECT COUNT(*)
                        FROM sync_template_m2n_colmun
                        WHERE template_id = NEW.template_id
                    ),
                    trigger_desc =
                    (
                        SELECT GROUP_CONCAT("<",sync_csv_column.element,">")
                        FROM sync_template_m2n_colmun
                        INNER JOIN sync_csv_column ON sync_csv_column.id = sync_template_m2n_colmun.column_id
                        WHERE sync_csv_template.id = NEW.template_id
                        ORDER BY sync_template_m2n_colmun.id
                    )
                WHERE sync_csv_template.id = NEW.template_id;
            END
        ');

        DB::unprepared('DROP TRIGGER IF EXISTS sync_template_m2n_colmun_au');
        DB::unprepared('
            CREATE TRIGGER sync_template_m2n_colmun_au
            AFTER UPDATE ON sync_template_m2n_colmun FOR EACH ROW
            BEGIN
                UPDATE sync_csv_template
                SET trigger_column_count =
                    (
                        SELECT COUNT(*)
                        FROM sync_template_m2n_colmun
                        WHERE template_id = NEW.template_id
                    ),
                    trigger_desc =
                    (
                        SELECT GROUP_CONCAT("<",sync_csv_column.element,">")
                        FROM sync_template_m2n_colmun
                        INNER JOIN sync_csv_column ON sync_csv_column.id = sync_template_m2n_colmun.column_id
                        WHERE sync_csv_template.id = NEW.template_id
                        ORDER BY sync_template_m2n_colmun.id
                    )
                WHERE sync_csv_template.id = NEW.template_id;
            END
        ');

        DB::unprepared('DROP TRIGGER IF EXISTS sync_template_m2n_colmun_ad');
        DB::unprepared('
            CREATE TRIGGER sync_template_m2n_colmun_ad
            AFTER DELETE ON sync_template_m2n_colmun FOR EACH ROW
            BEGIN
                UPDATE sync_csv_template
                SET trigger_column_count =
                    (
                        SELECT COUNT(*)
                        FROM sync_template_m2n_colmun
                        WHERE template_id = OLD.template_id
                    ),
                    trigger_desc =
                    (
                        SELECT GROUP_CONCAT("<",sync_csv_column.element,">")
                        FROM sync_template_m2n_colmun
                        INNER JOIN sync_csv_column ON sync_csv_column.id = sync_template_m2n_colmun.column_id
                        WHERE sync_csv_template.id = OLD.template_id
                        ORDER BY sync_template_m2n_colmun.id
                    )
                WHERE sync_csv_template.id = OLD.template_id;
            END
        ');
    }

    public function down()
    {
        Schema::dropIfExists('sync_template_m2n_colmun');
    }

}