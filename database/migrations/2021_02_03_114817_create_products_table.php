<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('products');

        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('product_id');
            $table->timestamps();
            $table->integer('quantity');
            $table->integer('price');
            $table->string('name', 250);
            $table->string('short_description');
            $table->text('description');

        });
        Schema::table('products', function (Blueprint $table) {
            $table->bigInteger('category_category_id')->unsigned();
            $table->foreign('category_category_id')->references('category_id')->on('categories');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['category_category_id']);;
        });
        Schema::dropIfExists('products');
    }
}
