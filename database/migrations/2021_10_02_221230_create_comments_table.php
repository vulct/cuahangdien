<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductReviewsTable extends Migration
{
    public function up()
    {
        Schema::create('product_reviews', function (Blueprint $table) {
            $table->id();
            $table->string('name', 200);
            $table->string('email');
            $table->smallInteger('rating')->nullable();
            $table->string('content',1500)->nullable();
            $table->tinyInteger('type')->default(0);
            // 0 - đánh giá sản phẩm, 1 - bình luận tin tức
            $table->tinyInteger('active')->default(1);
            $table->tinyInteger('isDelete')->default(0);
            $table->timestamps();
        });

        Schema::table('product_reviews', function (Blueprint $table) {
            $table->foreignId('product_id')
                ->nullable()->default(0)->index()
                ->constrained();
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_reviews');
    }
}
