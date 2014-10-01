<?php

class MediaVariationsSeeder extends Seeder
{
    public function run()
    {
        $media2variace = [
            ['mv_id' => '1', 'mv_id_type' => '0', 'mv_visible_rule' => '1', 'mv_visible_group' => '0', 'mv_visible_media' => '0', 'mv_visible_prod' => '0', 'mv_tag' => '0', 'mv_class' => NULL, 'mv_icon' => NULL, 'mv_name' => '[NULL]'],
            ['mv_id' => '101', 'mv_id_type' => '1', 'mv_visible_rule' => '1', 'mv_visible_group' => '0', 'mv_visible_media' => '0', 'mv_visible_prod' => '0', 'mv_tag' => '0', 'mv_class' => NULL, 'mv_icon' => NULL, 'mv_name' => 'Pouze text'],
            ['mv_id' => '102', 'mv_id_type' => '1', 'mv_visible_rule' => '0', 'mv_visible_group' => '0', 'mv_visible_media' => '0', 'mv_visible_prod' => '0', 'mv_tag' => '0', 'mv_class' => NULL, 'mv_icon' => NULL, 'mv_name' => 'Text => Aktuality'],
            ['mv_id' => '201', 'mv_id_type' => '2', 'mv_visible_rule' => '1', 'mv_visible_group' => '0', 'mv_visible_media' => '1', 'mv_visible_prod' => '0', 'mv_tag' => 'file', 'mv_class' => 'type-doc', 'mv_icon' => 'ico_doc.gif', 'mv_name' => 'Document (*.DOC)'],
            ['mv_id' => '202', 'mv_id_type' => '2', 'mv_visible_rule' => '1', 'mv_visible_group' => '0', 'mv_visible_media' => '1', 'mv_visible_prod' => '0', 'mv_tag' => 'file', 'mv_class' => 'type-pdf', 'mv_icon' => 'ico_pdf.gif', 'mv_name' => 'Portable Document Format (*.PDF)'],
            ['mv_id' => '203', 'mv_id_type' => '2', 'mv_visible_rule' => '1', 'mv_visible_group' => '0', 'mv_visible_media' => '1', 'mv_visible_prod' => '0', 'mv_tag' => 'file', 'mv_class' => 'type-jpg', 'mv_icon' => 'ico_jpg.gif', 'mv_name' => 'JPEG (*.jpg)'],
            ['mv_id' => '301', 'mv_id_type' => '3', 'mv_visible_rule' => '1', 'mv_visible_group' => '0', 'mv_visible_media' => '1', 'mv_visible_prod' => '0', 'mv_tag' => 'video', 'mv_class' => NULL, 'mv_icon' => NULL, 'mv_name' => 'Youtube.com (Video stream)'],
            ['mv_id' => '302', 'mv_id_type' => '3', 'mv_visible_rule' => '1', 'mv_visible_group' => '0', 'mv_visible_media' => '1', 'mv_visible_prod' => '0', 'mv_tag' => 'video', 'mv_class' => NULL, 'mv_icon' => NULL, 'mv_name' => 'Stream.cz (Video stream)'],
            ['mv_id' => '309', 'mv_id_type' => '3', 'mv_visible_rule' => '1', 'mv_visible_group' => '0', 'mv_visible_media' => '1', 'mv_visible_prod' => '0', 'mv_tag' => '0', 'mv_class' => NULL, 'mv_icon' => NULL, 'mv_name' => 'Macromedia Flash - EMBED'],
            ['mv_id' => '401', 'mv_id_type' => '4', 'mv_visible_rule' => '1', 'mv_visible_group' => '0', 'mv_visible_media' => '0', 'mv_visible_prod' => '0', 'mv_tag' => NULL, 'mv_class' => NULL, 'mv_icon' => NULL, 'mv_name' => 'Middle => Akční multi okno'],
            ['mv_id' => '402', 'mv_id_type' => '4', 'mv_visible_rule' => '1', 'mv_visible_group' => '0', 'mv_visible_media' => '0', 'mv_visible_prod' => '0', 'mv_tag' => NULL, 'mv_class' => NULL, 'mv_icon' => NULL, 'mv_name' => 'Middle => Akční produkty úvodní strany'],
            ['mv_id' => '452', 'mv_id_type' => '1', 'mv_visible_rule' => '1', 'mv_visible_group' => '0', 'mv_visible_media' => '0', 'mv_visible_prod' => '0', 'mv_tag' => NULL, 'mv_class' => NULL, 'mv_icon' => NULL, 'mv_name' => 'Right => Box text'],
            ['mv_id' => '453', 'mv_id_type' => '4', 'mv_visible_rule' => '1', 'mv_visible_group' => '0', 'mv_visible_media' => '0', 'mv_visible_prod' => '0', 'mv_tag' => NULL, 'mv_class' => NULL, 'mv_icon' => NULL, 'mv_name' => 'Right => Formulář dotaz na zboží'],
            ['mv_id' => '454', 'mv_id_type' => '4', 'mv_visible_rule' => '1', 'mv_visible_group' => '0', 'mv_visible_media' => '0', 'mv_visible_prod' => '0', 'mv_tag' => NULL, 'mv_class' => NULL, 'mv_icon' => NULL, 'mv_name' => 'Right => Box aktuality'],
            ['mv_id' => '456', 'mv_id_type' => '4', 'mv_visible_rule' => '1', 'mv_visible_group' => '0', 'mv_visible_media' => '0', 'mv_visible_prod' => '0', 'mv_tag' => NULL, 'mv_class' => NULL, 'mv_icon' => NULL, 'mv_name' => 'Right => Registrace emailu'],
            ['mv_id' => '481', 'mv_id_type' => '4', 'mv_visible_rule' => '1', 'mv_visible_group' => '0', 'mv_visible_media' => '0', 'mv_visible_prod' => '0', 'mv_tag' => NULL, 'mv_class' => NULL, 'mv_icon' => NULL, 'mv_name' => 'Aktivace pravidla => Suggest Simple'],
            ['mv_id' => '483', 'mv_id_type' => '4', 'mv_visible_rule' => '1', 'mv_visible_group' => '0', 'mv_visible_media' => '0', 'mv_visible_prod' => '0', 'mv_tag' => NULL, 'mv_class' => NULL, 'mv_icon' => NULL, 'mv_name' => 'Aktivace pravidla => Suggest Favorite'],
            ['mv_id' => '501', 'mv_id_type' => '5', 'mv_visible_rule' => '0', 'mv_visible_group' => '1', 'mv_visible_media' => '1', 'mv_visible_prod' => '0', 'mv_tag' => '0', 'mv_class' => NULL, 'mv_icon' => NULL, 'mv_name' => 'Seskupení produktů pro pravidla webu'],
            ['mv_id' => '502', 'mv_id_type' => '5', 'mv_visible_rule' => '0', 'mv_visible_group' => '1', 'mv_visible_media' => '1', 'mv_visible_prod' => '0', 'mv_tag' => '0', 'mv_class' => NULL, 'mv_icon' => NULL, 'mv_name' => 'Seskupení podobných produktů'],
            ['mv_id' => '503', 'mv_id_type' => '5', 'mv_visible_rule' => '1', 'mv_visible_group' => '1', 'mv_visible_media' => '1', 'mv_visible_prod' => '0', 'mv_tag' => '0', 'mv_class' => NULL, 'mv_icon' => NULL, 'mv_name' => 'Seskupení => Jednoduché'],
            ['mv_id' => '504', 'mv_id_type' => '5', 'mv_visible_rule' => '1', 'mv_visible_group' => '1', 'mv_visible_media' => '1', 'mv_visible_prod' => '0', 'mv_tag' => '0', 'mv_class' => NULL, 'mv_icon' => NULL, 'mv_name' => 'Seskupení => Složité'],
            ['mv_id' => '601', 'mv_id_type' => '6', 'mv_visible_rule' => '1', 'mv_visible_group' => '0', 'mv_visible_media' => '0', 'mv_visible_prod' => '1', 'mv_tag' => '0', 'mv_class' => NULL, 'mv_icon' => NULL, 'mv_name' => 'Technická data'],
            ['mv_id' => '602', 'mv_id_type' => '6', 'mv_visible_rule' => '1', 'mv_visible_group' => '0', 'mv_visible_media' => '0', 'mv_visible_prod' => '1', 'mv_tag' => '0', 'mv_class' => NULL, 'mv_icon' => NULL, 'mv_name' => 'Vybavení a charakteristika'],
            ['mv_id' => '603', 'mv_id_type' => '6', 'mv_visible_rule' => '1', 'mv_visible_group' => '0', 'mv_visible_media' => '0', 'mv_visible_prod' => '1', 'mv_tag' => '0', 'mv_class' => NULL, 'mv_icon' => NULL, 'mv_name' => 'Důležité znaky'],
            ['mv_id' => '604', 'mv_id_type' => '6', 'mv_visible_rule' => '1', 'mv_visible_group' => '0', 'mv_visible_media' => '0', 'mv_visible_prod' => '1', 'mv_tag' => '0', 'mv_class' => NULL, 'mv_icon' => NULL, 'mv_name' => 'Rozsah dodávky'],
            ['mv_id' => '605', 'mv_id_type' => '6', 'mv_visible_rule' => '1', 'mv_visible_group' => '0', 'mv_visible_media' => '0', 'mv_visible_prod' => '1', 'mv_tag' => '0', 'mv_class' => NULL, 'mv_icon' => NULL, 'mv_name' => 'Přednosti výrobku'],
            ['mv_id' => '606', 'mv_id_type' => '6', 'mv_visible_rule' => '1', 'mv_visible_group' => '0', 'mv_visible_media' => '0', 'mv_visible_prod' => '1', 'mv_tag' => '0', 'mv_class' => NULL, 'mv_icon' => NULL, 'mv_name' => 'Používá se pro'],
            ['mv_id' => '608', 'mv_id_type' => '6', 'mv_visible_rule' => '1', 'mv_visible_group' => '0', 'mv_visible_media' => '0', 'mv_visible_prod' => '1', 'mv_tag' => '0', 'mv_class' => NULL, 'mv_icon' => NULL, 'mv_name' => 'Obsah balení'],
            ['mv_id' => '609', 'mv_id_type' => '6', 'mv_visible_rule' => '1', 'mv_visible_group' => '0', 'mv_visible_media' => '0', 'mv_visible_prod' => '1', 'mv_tag' => '0', 'mv_class' => NULL, 'mv_icon' => NULL, 'mv_name' => 'Doporučujeme']
        ];

        DB::table('media_variations')->delete();

        foreach ($media2variace as $row) {

            DB::table('media_variations')->insert([
                'id'            => $row['mv_id'],
                'type_id'       => $row['mv_id_type'],
                'visible_rule'  => $row['mv_visible_rule'],
                'visible_group' => $row['mv_visible_group'],
                'visible_media' => $row['mv_visible_media'],
                'visible_prod'  => $row['mv_visible_prod'],
                'tag'           => $row['mv_tag'],
                'class'         => $row['mv_class'],
                'icon'          => $row['mv_icon'],
                'name'          => $row['mv_name'],
            ]);
        }
    }
}