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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name',200);
            $table->string('meta_title',100)->nullable();
            $table->text('content')->nullable();
            $table->string('description', 300)->nullable();
            $table->string('image', 255)->nullable();
            $table->string('slug',120)->index();
            $table->string('warranty',255);
            $table->string('unit',255);
            $table->tinyInteger('active')->default(1);
            $table->tinyInteger('isDelete')->default(0);
            $table->integer('view')->default(0);
            $table->integer('category_id')->index();
            $table->integer('brand_id')->index();
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('brand_id')->references('id')->on('brands');
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
