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
            $table->string('name', 200);
            $table->string('meta_title', 100)->nullable();
            $table->text('content')->nullable();
            $table->string('description', 300)->nullable();
            $table->string('image', 255)->nullable();
            $table->string('slug', 120)->index();
            $table->string('warranty', 255);
            $table->string('unit', 255);
            $table->string('keyword');
            $table->tinyInteger('active')->default(1);
            $table->tinyInteger('isDelete')->default(0);
            $table->integer('view')->default(0);
            $table->timestamps();
        });

        Schema::table('products', function (Blueprint $table) {
            $table->foreignId('category_id')
                ->nullable()->default(0)->index()
                ->constrained();
            $table->foreignId('brand_id')
                ->nullable()->default(0)->index()
                ->constrained();
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
