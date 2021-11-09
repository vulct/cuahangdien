<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('name',200);
            $table->string('slug',120)->index();
            $table->string('keyword', 200)->nullable();
            $table->string('description', 300)->nullable();
            $table->longText('content');
            $table->tinyInteger('type')->default(0);
            //0 - về chúng tôi, 1 - tuyển dụng, 2 - hướng dẫn mua hàng
            // 3 - thanh toán vận chuyển, 4 - bảo hành đổi trả,
            // 5 - chính sách bảo mật
            $table->tinyInteger('active')->default(1);
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
        Schema::dropIfExists('pages');
    }
}
