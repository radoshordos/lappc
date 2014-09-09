<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProdWarranty extends Migration {

    public function up()
    {
        Schema::create('prod_warranty', function (Blueprint $table) {

            $table->tinyInteger('id')->unsigned();
            $table->tinyInteger('warranty_month')->unsigned();
            $table->string('name');

            $table->engine = 'InnoDB';
            $table->primary('id');
            $table->unique('name');
        });
    }

    public function down()
    {
        Schema::dropIfExists('prod_warranty');
    }

}
