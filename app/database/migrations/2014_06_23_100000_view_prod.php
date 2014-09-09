<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ViewProd extends Migration
{

    public function up()
    {
        DB::unprepared('DROP TABLE IF EXISTS view_prod');

        DB::unprepared('
            CREATE OR REPLACE VIEW
            view_prod AS
            SELECT  prod.id AS prod_id,
                    prod.mode_id AS prod_mode_id,
                    prod.alias AS prod_alias,
                    prod.name AS prod_name,
                    prod.desc AS prod_desc,
                    prod.price AS prod_price,
                    prod_warranty.name AS warranty_name,
                    prod.items_count_all AS prod_items_count_all,
                    prod.items_count_visible AS prod_items_count_visible,
                    tree.id AS tree_id,
                    tree.absolute AS tree_absolute,
                    dev.id AS dev_id,
                    dev.name AS dev_name
            FROM    prod
            INNER JOIN prod_warranty ON prod.warranty_id = prod_warranty.id
            INNER JOIN dev ON prod.dev_id = dev.id
            INNER JOIN tree ON prod.tree_id = tree.id
        ');
    }

    public function down()
    {
        DB::unprepared('DROP TABLE IF EXISTS view_prod');
    }

}