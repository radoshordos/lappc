<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProdWarranty extends Migration {

    public function up()
    {
        Schema::create('prod_warranty', function (Blueprint $table) {

            $table->tinyInteger('id')->unsigned();
            $table->boolean('visible')->default(1);
            $table->tinyInteger('warranty_month');
            $table->string('name');

            $table->engine = 'InnoDB';
            $table->primary('id');
        });
    }


    public function down()
    {
        Schema::drop('prod_warranty');
    }

}
