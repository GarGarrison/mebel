<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('header');
            $table->string('menu_name');
            $table->string('url_name');
            $table->string('title');
            $table->string('meta_keywords');
            $table->string('meta_description');
            $table->text('text');
            $table->text('annotation');
            $table->string('preview_img');
            $table->boolean('usefull')->default(True);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
