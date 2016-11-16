<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sections', function (Blueprint $table) {
            $table->increments('id');
            $table->string('header');
            $table->string('menu_name');
            $table->string('url_name');
            $table->string('img_base');
            $table->string('img_title');
            $table->string('title');
            $table->string('h2');
            $table->string('meta_keywords');
            $table->string('meta_description');
            $table->text('text');
            $table->boolean('main_section');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sections', function (Blueprint $table) {
            Schema::drop('sections');
        });
    }
}
