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
            $table->integer('parent_section');
            $table->string('name');
            $table->string('menu_name');
            $table->string('translit');
            $table->string('img_base');
            $table->string('title_img');
            $table->text('description');
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
