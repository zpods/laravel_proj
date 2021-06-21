<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::dropIfExists('product_user');
        Schema::create('product_user', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('cartproduct_id')->unsigned();
            $table->foreign('cartproduct_id')->references('product_id')->on('products');
            $table->bigInteger('cartcustomer_id')->unsigned();
            $table->foreign('cartcustomer_id')->references('customer_id')->on('users');
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

            Schema::table('product_user', function (Blueprint $table) {


                $table->dropForeign('product_user_cartproduct_id_foreign');

                $table->dropForeign('product_user_cartcustomer_id_foreign');


            });

            Schema::dropIfExists('product_user');

    }
}
