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
            $table->integer('item_id')->unsigned()->nullable();
            $table->integer('record_id')->unsigned()->nullable();
            $table->integer('dev_id')->unsigned();
            $table->string('code_prod', '32')->nullable();
            $table->string('code_ean', '32')->nullable();
            $table->string('name', '80')->nullable();
            $table->string('desc', '160')->nullable();
            $table->decimal('price_standard', 9, 2)->unsigned()->nullable();
            $table->decimal('price_action', 9, 2)->unsigned()->nullable();
            $table->decimal('price_internet', 9, 2)->unsigned()->nullable();
            $table->integer('availability_count')->default(0);
            $table->float('weight')->unsigned();
            $table->string('common_group', 64)->nullable();

            $table->timestamps();
            $table->engine = 'InnoDB';
            $table->unique(['purpose', 'dev_id', 'code_prod']);
            $table->unique(['purpose', 'code_ean']);
            $table->foreign('item_id')->references('id')->on('items')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('dev_id')->references('id')->on('dev')->onUpdate('cascade')->onDelete('no action');
        });
    }

    public function down()
    {
        Schema::dropIfExists('sync_db');
    }

}