<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('header');
            $table->string('menu_name');
            $table->string('url_name');
            $table->string('img_base');
            $table->string('img_title');
            $table->string('title');
            $table->string('meta_keywords');
            $table->string('meta_description');
            $table->text('description');
            $table->integer('parent_section');
            $table->boolean('root_product');
            $table->boolean('calculator')->default(False);
            $table->boolean('have_property')->default(False);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
