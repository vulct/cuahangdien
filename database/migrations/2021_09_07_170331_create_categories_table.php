<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name',200);
            $table->string('meta_title',100)->nullable();
            $table->string('slug',120)->index();
            $table->integer('parent_id');
            $table->string('keyword', 200)->nullable();
            $table->string('icon', 200)->nullable();
            $table->text('description')->nullable();
            $table->string('image',255)->nullable();
            $table->tinyInteger('type')->default(0);
            // 0 - thư mục sản phẩm, 1 - thư mục bài đăng.
            $table->tinyInteger('active')->default(1);
            $table->tinyInteger('top')->default(0);
            $table->tinyInteger('isDelete')->default(0);
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
        Schema::dropIfExists('categories');
    }
}
