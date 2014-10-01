<?php

class ProdDescription extends Seeder
{
    public function run()
    {
        $prod2multi2description = [
            ['pmd_id' => '402', 'pmd_id_prod' => '1', 'pmd_id_media_var' => '601', 'pmd_data' => 'Otáčky naprázdno 1. stupeň : 0–350 min–1
Otáčky naprázdno 2. stupeň : 0–1200 min–1
Vrtací výkon do ocele : 10 mm
Šrouby do dřeva : 25 mm
Max. krouticí moment : 36/20 Nm
Upínací rozsah sklíčidla : 0,8–10 mm
Napětí akumulátoru : 14,4 V/2 Ah
Hmotnost : 1,6 kg'],
            ['pmd_id' => '403', 'pmd_id_prod' => '1', 'pmd_id_media_var' => '602', 'pmd_data' => 'Nový šroubovák s kompaktním designem
2stupňová planetární převodovka s kovovým soukolím
16 stupňů kroutícího momentu, 2 stupně pro vrtání, elektronika, bzda motoru
Sériově s kufrem, 2 akumulátory a nabíječkou'],
            ['pmd_id' => '400', 'pmd_id_prod' => '2', 'pmd_id_media_var' => '601', 'pmd_data' => 'Otáčky naprázdno 1. stupeň : 0–350 min–1
Otáčky naprázdno 2. stupeň : 0–1200 min–1
Vrtací výkon do ocele : 10 mm
Šrouby do dřeva : 25 mm
Max. krouticí moment : 36/20 Nm
Upínací rozsah sklíčidla : 0,8–10 mm
Napětí akumulátoru : 14,4 V/2 Ah
Hmotnost : 1,6 kg'],
            ['pmd_id' => '401', 'pmd_id_prod' => '2', 'pmd_id_media_var' => '602', 'pmd_data' => 'Nový šroubovák s kompaktním designem
2stupňová planetární převodovka s kovovým soukolím
16 stupňů kroutícího momentu, 2 stupně pro vrtání, elektronika, bzda motoru
Sériově s kufrem, 2 akumulátory, nabíječkou a lampou ML140'],
            ['pmd_id' => '214', 'pmd_id_prod' => '3', 'pmd_id_media_var' => '601', 'pmd_data' => 'Otáčky naprázdno 1. stupeň : 0–400 min–1
Otáčky naprázdno 2. stupeň : 0–1300 min–1
Vrtací výkon do ocele : 13 mm
Vrtací výkon do dřeva : 25 mm
Max. krouticí moment : 60/25 Nm
Upínací rozsah sklíčidla : 1,5–13 mm
Napětí/kapacita akumulátoru : 12 V/2,6 Ah
Hmotnost : 2,0 kg'],
            ['pmd_id' => '215', 'pmd_id_prod' => '3', 'pmd_id_media_var' => '602', 'pmd_data' => 'Z venku vyměnitelné bronzové uhlíky
Konstukce motoru s vyměnitelným rotorem
16 stupňů kroutícího momentu, 2 stupně pro vrtání, elektronika, brzda motoru
Model Makita 6317DWDE s kufrem, 2 akumulátory, nabíječkou'],
            ['pmd_id' => '210', 'pmd_id_prod' => '4', 'pmd_id_media_var' => '601', 'pmd_data' => 'Otáčky naprázdno 1. stupeň : 0–400 min–1
Otáčky naprázdno 2. stupeň : 0–1300 min–1
Vrtací výkon do ocele : 13 mm
Vrtací výkon do dřeva : 25 mm
Max. krouticí moment : 60/25 Nm
Upínací rozsah sklíčidla : 1,5–13 mm
Napětí/kapacita akumulátoru : 12 V/2,6 Ah
Hmotnost : 2,0 kg'],
            ['pmd_id' => '211', 'pmd_id_prod' => '4', 'pmd_id_media_var' => '602', 'pmd_data' => 'Z venku vyměnitelné bronzové uhlíky
Konstukce motoru s vyměnitelným rotorem
16 stupňů kroutícího momentu, 2 stupně pro vrtání, elektronika, brzda motoru
Model Makita 6317DWDE s kufrem, 2 akumulátory, nabíječkou a rádiolampou ML 124']
        ];

        DB::table('prod_description')->delete();

        foreach ($prod2multi2description as $row) {

            DB::table('prod_description')->insert([
                'id'            => $row['pmd_id'],
                'prod_id'       => $row['pmd_id_prod'],
                'variations_id' => $row['pmd_id_media_var'],
                'data'          => $row['pmd_data'],
            ]);
        }
    }
}