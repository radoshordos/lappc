<?php

class RecordMarketSellSeeder extends Seeder
{

    public function run()
    {
        $log2market = [
            ['lm_id' => '9', 'lm_month' => '2011-06-01', 'lm_count_buy_all' => '70', 'lm_count_buy_success' => '64', 'lm_price_all' => '199513', 'lm_price_transport' => '4016'],
            ['lm_id' => '10', 'lm_month' => '2011-07-01', 'lm_count_buy_all' => '82', 'lm_count_buy_success' => '69', 'lm_price_all' => '209420', 'lm_price_transport' => '4551'],
            ['lm_id' => '11', 'lm_month' => '2011-08-01', 'lm_count_buy_all' => '118', 'lm_count_buy_success' => '99', 'lm_price_all' => '316578', 'lm_price_transport' => '5353'],
            ['lm_id' => '15', 'lm_month' => '2011-05-01', 'lm_count_buy_all' => '100', 'lm_count_buy_success' => '87', 'lm_price_all' => '245298', 'lm_price_transport' => '5457'],
            ['lm_id' => '16', 'lm_month' => '2011-04-01', 'lm_count_buy_all' => '99', 'lm_count_buy_success' => '89', 'lm_price_all' => '319847', 'lm_price_transport' => '5324'],
            ['lm_id' => '17', 'lm_month' => '2011-03-01', 'lm_count_buy_all' => '69', 'lm_count_buy_success' => '60', 'lm_price_all' => '204458', 'lm_price_transport' => '3807'],
            ['lm_id' => '18', 'lm_month' => '2011-09-01', 'lm_count_buy_all' => '122', 'lm_count_buy_success' => '107', 'lm_price_all' => '330948', 'lm_price_transport' => '7316'],
            ['lm_id' => '19', 'lm_month' => '2011-10-01', 'lm_count_buy_all' => '117', 'lm_count_buy_success' => '106', 'lm_price_all' => '278025', 'lm_price_transport' => '7554'],
            ['lm_id' => '20', 'lm_month' => '2011-11-01', 'lm_count_buy_all' => '161', 'lm_count_buy_success' => '147', 'lm_price_all' => '408388', 'lm_price_transport' => '10081'],
            ['lm_id' => '21', 'lm_month' => '2011-12-01', 'lm_count_buy_all' => '171', 'lm_count_buy_success' => '138', 'lm_price_all' => '293097', 'lm_price_transport' => '11688'],
            ['lm_id' => '22', 'lm_month' => '2012-01-01', 'lm_count_buy_all' => '102', 'lm_count_buy_success' => '83', 'lm_price_all' => '273533', 'lm_price_transport' => '6305'],
            ['lm_id' => '23', 'lm_month' => '2012-02-01', 'lm_count_buy_all' => '82', 'lm_count_buy_success' => '70', 'lm_price_all' => '162391', 'lm_price_transport' => '6127'],
            ['lm_id' => '24', 'lm_month' => '2012-03-01', 'lm_count_buy_all' => '82', 'lm_count_buy_success' => '75', 'lm_price_all' => '182381', 'lm_price_transport' => '4742'],
            ['lm_id' => '25', 'lm_month' => '2012-04-01', 'lm_count_buy_all' => '73', 'lm_count_buy_success' => '64', 'lm_price_all' => '202830', 'lm_price_transport' => '4491'],
            ['lm_id' => '26', 'lm_month' => '2012-05-01', 'lm_count_buy_all' => '85', 'lm_count_buy_success' => '78', 'lm_price_all' => '277706', 'lm_price_transport' => '4669'],
            ['lm_id' => '27', 'lm_month' => '2012-06-01', 'lm_count_buy_all' => '67', 'lm_count_buy_success' => '60', 'lm_price_all' => '184025', 'lm_price_transport' => '3589'],
            ['lm_id' => '28', 'lm_month' => '2012-07-01', 'lm_count_buy_all' => '73', 'lm_count_buy_success' => '67', 'lm_price_all' => '212033', 'lm_price_transport' => '3808'],
            ['lm_id' => '29', 'lm_month' => '2012-08-01', 'lm_count_buy_all' => '70', 'lm_count_buy_success' => '62', 'lm_price_all' => '233186', 'lm_price_transport' => '3568'],
            ['lm_id' => '30', 'lm_month' => '2012-09-01', 'lm_count_buy_all' => '57', 'lm_count_buy_success' => '54', 'lm_price_all' => '137394', 'lm_price_transport' => '4069'],
            ['lm_id' => '31', 'lm_month' => '2012-10-01', 'lm_count_buy_all' => '82', 'lm_count_buy_success' => '73', 'lm_price_all' => '216836', 'lm_price_transport' => '5746'],
            ['lm_id' => '32', 'lm_month' => '2012-11-01', 'lm_count_buy_all' => '92', 'lm_count_buy_success' => '74', 'lm_price_all' => '230927', 'lm_price_transport' => '6064'],
            ['lm_id' => '33', 'lm_month' => '2012-12-01', 'lm_count_buy_all' => '67', 'lm_count_buy_success' => '58', 'lm_price_all' => '215381', 'lm_price_transport' => '3723'],
            ['lm_id' => '34', 'lm_month' => '2013-01-01', 'lm_count_buy_all' => '68', 'lm_count_buy_success' => '52', 'lm_price_all' => '226308', 'lm_price_transport' => '2630'],
            ['lm_id' => '35', 'lm_month' => '2013-02-01', 'lm_count_buy_all' => '36', 'lm_count_buy_success' => '27', 'lm_price_all' => '86004', 'lm_price_transport' => '2025'],
            ['lm_id' => '36', 'lm_month' => '2013-03-01', 'lm_count_buy_all' => '53', 'lm_count_buy_success' => '45', 'lm_price_all' => '145970', 'lm_price_transport' => '2829'],
            ['lm_id' => '37', 'lm_month' => '2013-04-01', 'lm_count_buy_all' => '66', 'lm_count_buy_success' => '57', 'lm_price_all' => '187950', 'lm_price_transport' => '4050'],
            ['lm_id' => '38', 'lm_month' => '2013-05-01', 'lm_count_buy_all' => '60', 'lm_count_buy_success' => '56', 'lm_price_all' => '171851', 'lm_price_transport' => '3573'],
            ['lm_id' => '39', 'lm_month' => '2013-06-01', 'lm_count_buy_all' => '52', 'lm_count_buy_success' => '45', 'lm_price_all' => '164399', 'lm_price_transport' => '2690'],
            ['lm_id' => '40', 'lm_month' => '2013-07-01', 'lm_count_buy_all' => '36', 'lm_count_buy_success' => '33', 'lm_price_all' => '88723', 'lm_price_transport' => '2442'],
            ['lm_id' => '41', 'lm_month' => '2013-08-01', 'lm_count_buy_all' => '39', 'lm_count_buy_success' => '35', 'lm_price_all' => '136690', 'lm_price_transport' => '2025'],
            ['lm_id' => '42', 'lm_month' => '2013-09-01', 'lm_count_buy_all' => '48', 'lm_count_buy_success' => '36', 'lm_price_all' => '149249', 'lm_price_transport' => '2442'],
            ['lm_id' => '43', 'lm_month' => '2013-10-01', 'lm_count_buy_all' => '55', 'lm_count_buy_success' => '51', 'lm_price_all' => '135992', 'lm_price_transport' => '3633'],
            ['lm_id' => '44', 'lm_month' => '2013-11-01', 'lm_count_buy_all' => '80', 'lm_count_buy_success' => '70', 'lm_price_all' => '207847', 'lm_price_transport' => '4557'],
            ['lm_id' => '45', 'lm_month' => '2013-12-01', 'lm_count_buy_all' => '92', 'lm_count_buy_success' => '75', 'lm_price_all' => '206029', 'lm_price_transport' => '5549'],
            ['lm_id' => '46', 'lm_month' => '2014-01-01', 'lm_count_buy_all' => '76', 'lm_count_buy_success' => '61', 'lm_price_all' => '159425', 'lm_price_transport' => '4655'],
            ['lm_id' => '47', 'lm_month' => '2014-02-01', 'lm_count_buy_all' => '74', 'lm_count_buy_success' => '69', 'lm_price_all' => '234351', 'lm_price_transport' => '4824'],
            ['lm_id' => '48', 'lm_month' => '2014-03-01', 'lm_count_buy_all' => '65', 'lm_count_buy_success' => '58', 'lm_price_all' => '226586', 'lm_price_transport' => '3494'],
            ['lm_id' => '49', 'lm_month' => '2014-04-01', 'lm_count_buy_all' => '73', 'lm_count_buy_success' => '63', 'lm_price_all' => '204501', 'lm_price_transport' => '4527'],
            ['lm_id' => '50', 'lm_month' => '2014-05-01', 'lm_count_buy_all' => '64', 'lm_count_buy_success' => '52', 'lm_price_all' => '164105', 'lm_price_transport' => '3186'],
            ['lm_id' => '51', 'lm_month' => '2014-06-01', 'lm_count_buy_all' => '49', 'lm_count_buy_success' => '47', 'lm_price_all' => '135624', 'lm_price_transport' => '3832'],
            ['lm_id' => '52', 'lm_month' => '2014-07-01', 'lm_count_buy_all' => '61', 'lm_count_buy_success' => '53', 'lm_price_all' => '197574', 'lm_price_transport' => '3742'],
            ['lm_id' => '53', 'lm_month' => '2014-08-01', 'lm_count_buy_all' => '79', 'lm_count_buy_success' => '74', 'lm_price_all' => '222026', 'lm_price_transport' => '4565'],
            ['lm_id' => '54', 'lm_month' => '2014-09-01', 'lm_count_buy_all' => '73', 'lm_count_buy_success' => '64', 'lm_price_all' => '175007', 'lm_price_transport' => '5241'],
            ['lm_id' => '55', 'lm_month' => '2014-10-01', 'lm_count_buy_all' => '81', 'lm_count_buy_success' => '74', 'lm_price_all' => '251552', 'lm_price_transport' => '5996'],
            ['lm_id' => '56', 'lm_month' => '2014-11-01', 'lm_count_buy_all' => '152', 'lm_count_buy_success' => '139', 'lm_price_all' => '501385', 'lm_price_transport' => '8566']
        ];

        DB::table('record_market_sell')->delete();
        foreach ($log2market as $row) {
            DB::table('record_market_sell')->insert([
                'id'                => $row['lm_id'],
                'month'             => $row['lm_month'],
                'count_buy_all'     => $row['lm_count_buy_all'],
                'count_buy_success' => $row['lm_count_buy_success'],
                'price_all'         => $row['lm_price_all'],
                'price_transport'   => $row['lm_price_transport']
            ]);
        }
    }
}