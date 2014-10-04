<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GrabFunction extends Migration
{

    public function up()
    {

    }

    public function down()
    {
        Schema::dropIfExists('grab_function');
    }

}
