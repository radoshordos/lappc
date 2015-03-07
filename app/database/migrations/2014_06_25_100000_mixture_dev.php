<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class MixtureDev extends Migration
{
	public function up()
	{
		Schema::create('mixture_dev', function (Blueprint $table) {

			$table->increments('id')->unsigned();
			$table->enum('purpose', ['autoall', 'autosimple', 'devgroup', 'ppc'])->default('devgroup');
			$table->string('name', '160')->unique();
			$table->string('desc', '256')->nullable();
			$table->tinyInteger('trigger_column_count')->unsigned();

			$table->engine = 'InnoDB';
		});

        // Reserved for DEV_ID
        \DB::unprepared("ALTER TABLE mixture_dev AUTO_INCREMENT = 1001;");
	}

	public function down()
	{
		Schema::dropIfExists('mixture_dev');
	}
}