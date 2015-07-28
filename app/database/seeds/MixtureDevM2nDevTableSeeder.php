<?php

class MixtureDevM2nDevTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('mixture_dev_m2n_dev')->delete();
        $i = 0;

        $mixture_dev_m2n_dev = [
            ['id' => '1', 'mixture_dev_id' => '1010', 'dev_id' => '5'],
            ['id' => '2', 'mixture_dev_id' => '1010', 'dev_id' => '6'],
            ['id' => '3', 'mixture_dev_id' => '1010', 'dev_id' => '30'],
            ['id' => '4', 'mixture_dev_id' => '1012', 'dev_id' => '200'],
            ['id' => '5', 'mixture_dev_id' => '1012', 'dev_id' => '202'],
            ['id' => '6', 'mixture_dev_id' => '1012', 'dev_id' => '204'],
            ['id' => '7', 'mixture_dev_id' => '1012', 'dev_id' => '206'],
            ['id' => '8', 'mixture_dev_id' => '1012', 'dev_id' => '208'],
            ['id' => '9', 'mixture_dev_id' => '1012', 'dev_id' => '210'],
            ['id' => '10', 'mixture_dev_id' => '1012', 'dev_id' => '212'],
            ['id' => '11', 'mixture_dev_id' => '1012', 'dev_id' => '214'],
            ['id' => '12', 'mixture_dev_id' => '1012', 'dev_id' => '216'],
            ['id' => '13', 'mixture_dev_id' => '1012', 'dev_id' => '218'],
            ['id' => '14', 'mixture_dev_id' => '1012', 'dev_id' => '220'],
            ['id' => '15', 'mixture_dev_id' => '1012', 'dev_id' => '222'],
            ['id' => '16', 'mixture_dev_id' => '1012', 'dev_id' => '224'],
            ['id' => '17', 'mixture_dev_id' => '1012', 'dev_id' => '226'],
            ['id' => '175', 'mixture_dev_id' => '1012', 'dev_id' => '228'],
            ['id' => '18', 'mixture_dev_id' => '1013', 'dev_id' => '850'],
            ['id' => '19', 'mixture_dev_id' => '1013', 'dev_id' => '852'],
            ['id' => '20', 'mixture_dev_id' => '1013', 'dev_id' => '854'],
            ['id' => '21', 'mixture_dev_id' => '1013', 'dev_id' => '856'],
            ['id' => '22', 'mixture_dev_id' => '1013', 'dev_id' => '858'],
            ['id' => '23', 'mixture_dev_id' => '1013', 'dev_id' => '860'],
            ['id' => '24', 'mixture_dev_id' => '1013', 'dev_id' => '862'],
            ['id' => '25', 'mixture_dev_id' => '1013', 'dev_id' => '864'],
            ['id' => '26', 'mixture_dev_id' => '1013', 'dev_id' => '866'],
            ['id' => '27', 'mixture_dev_id' => '1013', 'dev_id' => '868'],
            ['id' => '28', 'mixture_dev_id' => '1013', 'dev_id' => '870'],
            ['id' => '29', 'mixture_dev_id' => '1014', 'dev_id' => '702'],
            ['id' => '30', 'mixture_dev_id' => '1014', 'dev_id' => '704'],
            ['id' => '31', 'mixture_dev_id' => '1014', 'dev_id' => '706'],
            ['id' => '32', 'mixture_dev_id' => '1014', 'dev_id' => '708'],
            ['id' => '33', 'mixture_dev_id' => '1014', 'dev_id' => '710'],
            ['id' => '34', 'mixture_dev_id' => '1014', 'dev_id' => '712'],
            ['id' => '35', 'mixture_dev_id' => '1014', 'dev_id' => '714'],
            ['id' => '36', 'mixture_dev_id' => '1014', 'dev_id' => '716'],
            ['id' => '37', 'mixture_dev_id' => '1014', 'dev_id' => '718'],
            ['id' => '38', 'mixture_dev_id' => '1014', 'dev_id' => '720'],
            ['id' => '39', 'mixture_dev_id' => '1014', 'dev_id' => '722'],
            ['id' => '40', 'mixture_dev_id' => '1014', 'dev_id' => '724'],
            ['id' => '41', 'mixture_dev_id' => '1014', 'dev_id' => '726'],
            ['id' => '42', 'mixture_dev_id' => '1014', 'dev_id' => '728'],
            ['id' => '43', 'mixture_dev_id' => '1014', 'dev_id' => '730'],
            ['id' => '44', 'mixture_dev_id' => '1014', 'dev_id' => '732'],
            ['id' => '45', 'mixture_dev_id' => '1014', 'dev_id' => '734'],
            ['id' => '46', 'mixture_dev_id' => '1014', 'dev_id' => '736'],
            ['id' => '47', 'mixture_dev_id' => '1014', 'dev_id' => '738'],
            ['id' => '48', 'mixture_dev_id' => '1014', 'dev_id' => '742'],
            ['id' => '49', 'mixture_dev_id' => '1014', 'dev_id' => '744'],
            ['id' => '50', 'mixture_dev_id' => '1015', 'dev_id' => '100'],
            ['id' => '51', 'mixture_dev_id' => '1015', 'dev_id' => '102'],
            ['id' => '52', 'mixture_dev_id' => '1015', 'dev_id' => '104'],
            ['id' => '52', 'mixture_dev_id' => '1015', 'dev_id' => '106'],
            ['id' => '52', 'mixture_dev_id' => '1015', 'dev_id' => '108'],
            ['id' => '53', 'mixture_dev_id' => '1016', 'dev_id' => '265'],
            ['id' => '53', 'mixture_dev_id' => '1016', 'dev_id' => '290'],
            ['id' => '53', 'mixture_dev_id' => '1017', 'dev_id' => '800'],
            ['id' => '54', 'mixture_dev_id' => '1017', 'dev_id' => '802'],
            ['id' => '55', 'mixture_dev_id' => '1017', 'dev_id' => '804'],
            ['id' => '56', 'mixture_dev_id' => '1017', 'dev_id' => '806'],
            ['id' => '57', 'mixture_dev_id' => '1017', 'dev_id' => '808'],
            ['id' => '58', 'mixture_dev_id' => '1017', 'dev_id' => '810'],
            ['id' => '59', 'mixture_dev_id' => '1017', 'dev_id' => '812'],
            ['id' => '364', 'mixture_dev_id' => '1018', 'dev_id' => '900'],
            ['id' => '365', 'mixture_dev_id' => '1018', 'dev_id' => '902'],
            ['id' => '366', 'mixture_dev_id' => '1018', 'dev_id' => '904'],
            ['id' => '367', 'mixture_dev_id' => '1018', 'dev_id' => '906'],
            ['id' => '368', 'mixture_dev_id' => '1018', 'dev_id' => '908'],
            ['id' => '369', 'mixture_dev_id' => '1018', 'dev_id' => '910'],
            ['id' => '370', 'mixture_dev_id' => '1018', 'dev_id' => '912'],
            ['id' => '371', 'mixture_dev_id' => '1018', 'dev_id' => '914']
        ];

        foreach ($mixture_dev_m2n_dev as $row) {

            DB::table('mixture_dev_m2n_dev')->insert([
                'id'             => ++$i,
                'mixture_dev_id' => $row['mixture_dev_id'],
                'dev_id'         => $row['dev_id']
            ]);
        }
    }
}