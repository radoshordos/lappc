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
                    prod.warranty_id AS prod_warranty_id,
                    prod.forex_id AS prod_forex_id,
                    prod.alias AS prod_alias,
                    prod.name AS prod_name,
                    prod.desc AS prod_desc,
                    prod.storeroom AS prod_storeroom,
                    prod.ic_all AS prod_ic_all,
                    prod.ic_visible AS prod_ic_visible,
                    prod.ic_availability_diff_visible AS prod_ic_availability_diff_visible,
                    prod.ic_price_diff_visible AS prod_ic_price_diff_visible,
                    prod.img_normal AS prod_img_normal,
                    prod.img_big AS prod_img_big,
                    prod.created_at AS prod_created_at,
                    prod.updated_at AS prod_updated_at,
                    tree.id AS tree_id,
                    tree.name AS tree_name,
                    tree.absolute AS tree_absolute,
                    tree.group_id AS tree_group_id,
                    dev.id AS dev_id,
                    dev.name AS dev_name,
                    akce.akce_template_id AS akce_template_id,
                    akce_template.bonus_title AS akce_template_bonus_title,
                    akce_minitext.name AS akce_minitext_name,
                    IF (akce_template.bonus_title IS NOT NULL, (SELECT CONCAT_WS(" + ",prod.name,akce_template.bonus_title)), prod.name) AS query_name,
                    IF (akce.akce_sale_id IS NOT NULL, (SELECT multiple FROM prod_sale WHERE prod_sale.id = akce_sale_id), (SELECT multiple FROM prod_sale WHERE prod_sale.id = prod.sale_id)) AS query_sale_multiple,
                    IF (akce.akce_price IS NOT NULL, (SELECT akce.akce_price * query_sale_multiple), (SELECT prod.price * query_sale_multiple)) AS query_price
            FROM prod
            INNER JOIN dev ON prod.dev_id = dev.id
            INNER JOIN tree ON prod.tree_id = tree.id
            LEFT JOIN akce ON prod.id = akce.akce_prod_id AND prod.mode_id = 4 AND akce.akce_template_id > 1
            LEFT JOIN akce_template ON akce.akce_template_id = akce_template.id
            LEFT JOIN akce_minitext ON akce_template.minitext_id = akce_minitext.id
        ');
    }

    public function down()
    {
        DB::unprepared('DROP TABLE IF EXISTS view_prod');
    }
}