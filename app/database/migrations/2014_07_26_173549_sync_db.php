<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class SyncDb extends Migration
{

    public function up()
    {
        Schema::create('sync_db', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->enum('purpose', ['manualsync', 'action', 'autosync', 'isystem']);
            $table->integer('record_id')->unsigned()->nullable();
            $table->integer('dev_id')->unsigned();
            $table->string('code_prod', '32')->nullable();
            $table->string('code_ean', '32')->nullable()->unique();
            $table->string('name', '80')->nullable();
            $table->string('desc', '160')->nullable();
            $table->decimal('price_standart', 9, 2)->unsigned()->nullable();
            $table->decimal('price_action', 9, 2)->unsigned()->nullable();
            $table->decimal('price_internet', 9, 2)->unsigned()->nullable();
            $table->timestamps();

            $table->engine = 'InnoDB';
            $table->unique(['dev_id', 'code_prod']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('sync_db');
    }

}