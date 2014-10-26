<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class MixtureTree extends Migration
{

    public function up()
    {
        Schema::create('mixture_tree', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->enum('purpose', ['ppc'])->default('ppc');
            $table->string('name', '160')->unique();

            $table->engine = 'InnoDB';
        });
    }

    public function down()
    {
        Schema::dropIfExists('mixture_tree');
    }

}