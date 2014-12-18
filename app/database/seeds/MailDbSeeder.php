<?php

class MailDbSeeder extends Seeder
{

	public function run()
	{
		DB::table('mail_db')->delete();
		$mail2list = [];
		include "migration/prod.php";

		foreach ($mail2list as $row) {

			DB::table('mail_db')->insert([
				'id'           => $row['ml_id'],
				'active'       => $row['ml_active'],
				'purpose'      => ($row['ml_id_mode'] == 1) ? 'insert_visitor' : 'insert_eshop',
				'email_sha1'   => $row['ml_email_sha1'],
				'email_secure' => $row['ml_email_secure'],
				'created_at'   => $row['ml_ts_current'],
			]);
		}

	}
}