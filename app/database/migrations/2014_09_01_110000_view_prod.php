<?php

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
                    prod.difference_id AS prod_difference_id,
                    prod.alias AS prod_alias,
                    prod.name AS prod_name,
                    prod.desc AS prod_desc,
                    prod.price AS prod_price,
                    prod.ic_all AS prod_ic_all,
                    prod.ic_visible AS prod_ic_visible,
                    prod.ic_availability_diff_visible AS prod_ic_availability_diff_visible,
                    prod.ic_sale_diff_visible AS prod_ic_sale_diff_visible,
                    prod.ic_price_diff_visible AS prod_ic_price_diff_visible,
                    prod.updated_at AS prod_updated_at,
                    prod_warranty.name AS prod_warranty_name,
                    tree.id AS tree_id,
                    tree.absolute AS tree_absolute,
                    dev.id AS dev_id,
                    dev.name AS dev_name,
                    akce.template_id AS akce_template_id,
                    akce_template.bonus_title AS akce_template_bonus_title,
                    akce_minitext.name AS akce_minitext_name
            FROM    prod
            INNER JOIN prod_warranty ON prod.warranty_id = prod_warranty.id
            INNER JOIN dev ON prod.dev_id = dev.id
            INNER JOIN tree ON prod.tree_id = tree.id
            LEFT JOIN akce ON prod.id = akce.prod_id AND prod.mode_id = 4
            LEFT JOIN akce_template ON akce.template_id = akce_template.id
            LEFT JOIN akce_minitext ON akce_template.minitext_id = akce_minitext.id
        ');
    }

    public function down()
    {
        DB::unprepared('DROP TABLE IF EXISTS view_prod');
    }
}