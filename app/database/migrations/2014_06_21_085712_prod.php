<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Prod extends Migration
{

    public function up()
    {
        Schema::create('prod', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('tree_id')->unsigned();
            $table->integer('dev_id')->unsigned();
            $table->tinyInteger('warranty_id')->unsigned()->default(1);
            $table->decimal('price', 9, 2)->unsigned();
            $table->string('alias', '64');
            $table->string('name', '64');
            $table->string('desc', '128');
            $table->timestamps();

            $table->engine = 'InnoDB';
            $table->unique('alias');
            $table->unique('name');
            $table->unique('desc');

            $table->foreign('tree_id')->references('id')->on('tree')->onUpdate('cascade')->onDelete('no action');
            $table->foreign('dev_id')->references('id')->on('dev')->onUpdate('cascade')->onDelete('no action');
            $table->foreign('warranty_id')->references('id')->on('prod_warranty')->onUpdate('cascade')->onDelete('no action');
        });

    }

    public function down()
    {
        Schema::drop('prod', function (Blueprint $table) {
            $table->dropForeign('tree_id');
            $table->dropForeign('dev_id');
            $table->dropForeign('warranty_id');
        });
    }

}