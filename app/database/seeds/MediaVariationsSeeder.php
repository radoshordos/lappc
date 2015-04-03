<?php

class MediaVariationsSeeder extends Seeder
{
    public function run()
    {
        $media2variace = [
            ['mv_id' => '1', 'mv_id_type' => '0', 'mv_visible_rule' => '1', 'mv_visible_group' => '0', 'mv_visible_media' => '0', 'mv_visible_prod' => '0', 'mv_tag' => NULL, 'mv_class' => NULL, 'mv_icon' => NULL, 'mv_name' => '[NULL]'],
            ['mv_id' => '101', 'mv_id_type' => '1', 'mv_visible_rule' => '1', 'mv_visible_group' => '0', 'mv_visible_media' => '0', 'mv_visible_prod' => '0', 'mv_tag' => NULL, 'mv_class' => NULL, 'mv_icon' => NULL, 'mv_name' => 'Pouze text'],
            ['mv_id' => '102', 'mv_id_type' => '1', 'mv_visible_rule' => '0', 'mv_visible_group' => '0', 'mv_visible_media' => '0', 'mv_visible_prod' => '0', 'mv_tag' => NULL, 'mv_class' => NULL, 'mv_icon' => NULL, 'mv_name' => 'Text => Aktuality'],

            ['mv_id' => '201', 'mv_id_type' => '2', 'mv_visible_rule' => '1', 'mv_visible_group' => '0', 'mv_visible_media' => '1', 'mv_visible_prod' => '0', 'mv_tag' => 'DOC', 'mv_class' => 'type-doc', 'mv_icon' => 'ico_doc.gif', 'mv_name' => 'Document (*.DOC, *.DOCX)'],
            ['mv_id' => '202', 'mv_id_type' => '2', 'mv_visible_rule' => '1', 'mv_visible_group' => '0', 'mv_visible_media' => '1', 'mv_visible_prod' => '0', 'mv_tag' => 'PDF', 'mv_class' => 'type-pdf', 'mv_icon' => 'ico_pdf.gif', 'mv_name' => 'Portable Document Format (*.PDF)'],
            ['mv_id' => '203', 'mv_id_type' => '2', 'mv_visible_rule' => '1', 'mv_visible_group' => '0', 'mv_visible_media' => '1', 'mv_visible_prod' => '0', 'mv_tag' => 'JPG', 'mv_class' => 'type-jpg', 'mv_icon' => 'ico_jpg.gif', 'mv_name' => 'JPEG (*.jpg)'],
            ['mv_id' => '301', 'mv_id_type' => '3', 'mv_visible_rule' => '1', 'mv_visible_group' => '0', 'mv_visible_media' => '1', 'mv_visible_prod' => '0', 'mv_tag' => 'YOUTUBE', 'mv_class' => NULL, 'mv_icon' => NULL, 'mv_name' => 'Youtube.com (Video stream)'],

            ['mv_id' => '601', 'mv_id_type' => '6', 'mv_visible_rule' => '1', 'mv_visible_group' => '0', 'mv_visible_media' => '0', 'mv_visible_prod' => '1', 'mv_tag' => 'PARAMETERS', 'mv_class' => NULL, 'mv_icon' => NULL, 'mv_name' => 'Technická data'],
            ['mv_id' => '602', 'mv_id_type' => '6', 'mv_visible_rule' => '1', 'mv_visible_group' => '0', 'mv_visible_media' => '0', 'mv_visible_prod' => '1', 'mv_tag' => NULL, 'mv_class' => NULL, 'mv_icon' => NULL, 'mv_name' => 'Vybavení a charakteristika'],
            ['mv_id' => '603', 'mv_id_type' => '6', 'mv_visible_rule' => '1', 'mv_visible_group' => '0', 'mv_visible_media' => '0', 'mv_visible_prod' => '1', 'mv_tag' => 'DESCRIPTIONS', 'mv_class' => NULL, 'mv_icon' => NULL, 'mv_name' => 'Popis'],
            ['mv_id' => '604', 'mv_id_type' => '6', 'mv_visible_rule' => '1', 'mv_visible_group' => '0', 'mv_visible_media' => '0', 'mv_visible_prod' => '1', 'mv_tag' => 'PACKAGECONTENTS', 'mv_class' => NULL, 'mv_icon' => NULL, 'mv_name' => 'Rozsah dodávky'],
            ['mv_id' => '605', 'mv_id_type' => '6', 'mv_visible_rule' => '1', 'mv_visible_group' => '0', 'mv_visible_media' => '0', 'mv_visible_prod' => '1', 'mv_tag' => NULL, 'mv_class' => NULL, 'mv_icon' => NULL, 'mv_name' => 'Přednosti výrobku'],
            ['mv_id' => '606', 'mv_id_type' => '6', 'mv_visible_rule' => '1', 'mv_visible_group' => '0', 'mv_visible_media' => '0', 'mv_visible_prod' => '1', 'mv_tag' => NULL, 'mv_class' => NULL, 'mv_icon' => NULL, 'mv_name' => 'Používá se pro'],
            ['mv_id' => '608', 'mv_id_type' => '6', 'mv_visible_rule' => '1', 'mv_visible_group' => '0', 'mv_visible_media' => '0', 'mv_visible_prod' => '1', 'mv_tag' => NULL, 'mv_class' => NULL, 'mv_icon' => NULL, 'mv_name' => 'Obsah balení'],
            ['mv_id' => '609', 'mv_id_type' => '6', 'mv_visible_rule' => '1', 'mv_visible_group' => '0', 'mv_visible_media' => '0', 'mv_visible_prod' => '1', 'mv_tag' => NULL, 'mv_class' => NULL, 'mv_icon' => NULL, 'mv_name' => 'Doporučujeme']
        ];

        DB::table('media_variations')->delete();

        foreach ($media2variace as $row) {

            if ($row['mv_id'] > 1) {
                $mv_id = $row['mv_id'] + 100;
            } else {
                $mv_id = $row['mv_id'];
            }

            DB::table('media_variations')->insert([
                'id'            => $mv_id,
                'type_id'       => ($row['mv_id_type'] + 1),
                'visible_group' => $row['mv_visible_group'],
                'visible_media' => $row['mv_visible_media'],
                'visible_prod'  => $row['mv_visible_prod'],
                'tag'           => $row['mv_tag'],
                'name'          => $row['mv_name'],
            ]);
        }
    }
}