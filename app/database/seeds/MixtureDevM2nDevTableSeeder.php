<?php

class MixtureDevM2nDevTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('mixture_dev_m2n_dev')->delete();
		$mixture_dev_m2n_dev = [
			['id' => '1', 'mixture_dev_id' => '10', 'dev_id' => '5'],
			['id' => '2', 'mixture_dev_id' => '10', 'dev_id' => '6'],
			['id' => '3', 'mixture_dev_id' => '10', 'dev_id' => '30'],
			['id' => '5', 'mixture_dev_id' => '12', 'dev_id' => '200'],
			['id' => '6', 'mixture_dev_id' => '12', 'dev_id' => '202'],
			['id' => '7', 'mixture_dev_id' => '12', 'dev_id' => '204'],
			['id' => '8', 'mixture_dev_id' => '12', 'dev_id' => '206'],
			['id' => '9', 'mixture_dev_id' => '12', 'dev_id' => '208'],
			['id' => '10', 'mixture_dev_id' => '12', 'dev_id' => '210'],
			['id' => '11', 'mixture_dev_id' => '12', 'dev_id' => '212'],
			['id' => '12', 'mixture_dev_id' => '12', 'dev_id' => '214'],
			['id' => '13', 'mixture_dev_id' => '12', 'dev_id' => '216'],
			['id' => '14', 'mixture_dev_id' => '12', 'dev_id' => '218'],
			['id' => '15', 'mixture_dev_id' => '12', 'dev_id' => '220'],
			['id' => '16', 'mixture_dev_id' => '12', 'dev_id' => '222'],
			['id' => '17', 'mixture_dev_id' => '12', 'dev_id' => '224'],
			['id' => '18', 'mixture_dev_id' => '12', 'dev_id' => '226'],
			['id' => '19', 'mixture_dev_id' => '13', 'dev_id' => '850'],
			['id' => '20', 'mixture_dev_id' => '13', 'dev_id' => '852'],
			['id' => '21', 'mixture_dev_id' => '13', 'dev_id' => '854'],
			['id' => '22', 'mixture_dev_id' => '13', 'dev_id' => '856'],
			['id' => '23', 'mixture_dev_id' => '13', 'dev_id' => '858'],
			['id' => '24', 'mixture_dev_id' => '13', 'dev_id' => '860'],
			['id' => '25', 'mixture_dev_id' => '13', 'dev_id' => '862'],
			['id' => '26', 'mixture_dev_id' => '13', 'dev_id' => '864'],
			['id' => '27', 'mixture_dev_id' => '13', 'dev_id' => '866'],
			['id' => '28', 'mixture_dev_id' => '13', 'dev_id' => '868'],
			['id' => '29', 'mixture_dev_id' => '13', 'dev_id' => '870'],
			['id' => '30', 'mixture_dev_id' => '14', 'dev_id' => '702'],
			['id' => '31', 'mixture_dev_id' => '14', 'dev_id' => '704'],
			['id' => '32', 'mixture_dev_id' => '14', 'dev_id' => '706'],
			['id' => '33', 'mixture_dev_id' => '14', 'dev_id' => '708'],
			['id' => '34', 'mixture_dev_id' => '14', 'dev_id' => '710'],
			['id' => '35', 'mixture_dev_id' => '14', 'dev_id' => '712'],
			['id' => '36', 'mixture_dev_id' => '14', 'dev_id' => '714'],
			['id' => '37', 'mixture_dev_id' => '14', 'dev_id' => '716'],
			['id' => '38', 'mixture_dev_id' => '14', 'dev_id' => '718'],
			['id' => '39', 'mixture_dev_id' => '14', 'dev_id' => '720'],
			['id' => '40', 'mixture_dev_id' => '14', 'dev_id' => '722'],
			['id' => '41', 'mixture_dev_id' => '14', 'dev_id' => '724'],
			['id' => '42', 'mixture_dev_id' => '14', 'dev_id' => '726'],
			['id' => '43', 'mixture_dev_id' => '14', 'dev_id' => '728'],
			['id' => '44', 'mixture_dev_id' => '14', 'dev_id' => '730'],
			['id' => '45', 'mixture_dev_id' => '14', 'dev_id' => '732'],
			['id' => '46', 'mixture_dev_id' => '14', 'dev_id' => '734'],
			['id' => '47', 'mixture_dev_id' => '14', 'dev_id' => '736'],
			['id' => '48', 'mixture_dev_id' => '14', 'dev_id' => '738'],
			['id' => '49', 'mixture_dev_id' => '14', 'dev_id' => '742'],
			['id' => '50', 'mixture_dev_id' => '14', 'dev_id' => '744']
		];

		foreach ($mixture_dev_m2n_dev as $row) {
			DB::table('mixture_dev_m2n_dev')->insert([
				'id'             => $row['id'],
				'mixture_dev_id' => $row['mixture_dev_id'],
				'dev_id'         => $row['dev_id']
			]);
		}
	}
}