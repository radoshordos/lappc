<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class ProdWarranty extends Migration {

    public function up()
    {
        Schema::create('prod_warranty', function (Blueprint $table) {

            $table->tinyInteger('id')->unsigned()->primary();
            $table->tinyInteger('warranty_month')->unsigned();
            $table->string('name')->unique();
            $table->engine = 'InnoDB';
        });
    }

    public function down()
    {
        Schema::dropIfExists('prod_warranty');
    }

}
