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
          $table->increments('product_id');
          $table->integer('uid');
          $table->integer('category');
          $table->integer('sub_category');
          $table->string('product_name');
          $table->double('product_price');
          $table->string('product_description');
          $table->string('product_link');
          $table->integer('views_today')->default(0);
          $table->integer('total_views')->default(0);
          $table->integer('product_of_the_day')->default(0);
          $table->integer('featured')->default(0);
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
        Schema::dropIfExists('products');
    }
}
