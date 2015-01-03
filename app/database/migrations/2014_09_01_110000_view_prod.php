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
                    prod.sale_id AS prod_sale_id,
                    prod.difference_id AS prod_difference_id,
                    prod.warranty_id AS prod_warranty_id,
                    prod.forex_id AS prod_forex_id,
                    prod.dph_id AS prod_dph_id,
                    prod.price AS prod_price,
                    prod.alias AS prod_alias,
                    prod.name AS prod_name,
                    prod.desc AS prod_desc,
                    prod.storeroom AS prod_storeroom,
                    prod.ic_all AS prod_ic_all,
                    prod.ic_visible AS prod_ic_visible,
                    prod.ic_availability_diff_visible AS prod_ic_availability_diff_visible,
                    prod.search_alias AS prod_search_alias,
                    prod.search_codes AS prod_search_codes,
                    prod.search_price AS prod_search_price,
                    prod.search_sell AS prod_search_sell,
                    prod.img_normal AS prod_img_normal,
                    prod.img_big AS prod_img_big,
                    prod.created_at AS prod_created_at,
                    prod.updated_at AS prod_updated_at,
                    prod_warranty.name AS prod_warranty_name,
                    prod_sale.name AS prod_sale_name,
                    prod_sale.multiple AS prod_sale_multiple,
                    tree.id AS tree_id,
                    tree.name AS tree_name,
                    tree.absolute AS tree_absolute,
                    tree.group_id AS tree_group_id,
                    dev.id AS dev_id,
                    dev.name AS dev_name,
                    dev.alias AS dev_alias,
                    akce.akce_price AS akce_price,
                    akce.akce_sale_id AS akce_sale_id,
                    akce_sale.multiple AS akce_sale_multiple,
                    akce.akce_template_id AS akce_template_id,
                    akce_template.bonus_title AS akce_template_bonus_title,
                    akce_minitext.name AS akce_minitext_name
            FROM prod
            INNER JOIN prod_sale ON prod_sale.id = prod.sale_id
            INNER JOIN prod_warranty ON prod_warranty.id = prod.warranty_id
            INNER JOIN dev ON prod.dev_id = dev.id
            INNER JOIN tree ON prod.tree_id = tree.id
            LEFT JOIN akce ON prod.id = akce.akce_prod_id AND prod.mode_id = 4 AND akce.akce_template_id > 1
            LEFT JOIN akce_sale ON akce_sale.id = akce.akce_sale_id
            LEFT JOIN akce_template ON akce.akce_template_id = akce_template.id
            LEFT JOIN akce_minitext ON akce_template.minitext_id = akce_minitext.id
        ');
	}

	public function down()
	{
		DB::unprepared('DROP TABLE IF EXISTS view_prod');
	}
}