<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string('name', 200);
            $table->string('email',200);
            $table->string('phone',20);
            $table->smallInteger('rating')->nullable();
            $table->string('content',1500)->nullable();
            $table->tinyInteger('type')->default(0);
            // 0 - đánh giá sản phẩm, 1 - bình luận tin tức, 2 - contact
            $table->tinyInteger('active')->default(1);
            $table->tinyInteger('isDelete')->default(0);
            $table->timestamps();
        });

        Schema::table('comments', function (Blueprint $table) {
            $table->foreignId('product_id')
                ->nullable()->index()
                ->constrained();

            $table->foreignId('post_id')
                ->nullable()->index()
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
        Schema::dropIfExists('comments');
    }
}
