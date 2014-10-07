<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GrabProfile extends Migration
{

    public function up()
    {
        Schema::create('grab_profile', function (Blueprint $table) {

            $table->increments('id')->unsigned()->primaty();
            $table->boolean('active')->default(1);
            $table->string('charset', 16);
            $table->string('name', 40)->unique();

            $table->engine = 'InnoDB';
        });
    }

    public function down()
    {
        Schema::dropIfExists('grab_profile');
    }
}
