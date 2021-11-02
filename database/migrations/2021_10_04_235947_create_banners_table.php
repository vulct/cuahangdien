<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannersTable extends Migration
{
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('title',100)->nullable();
            $table->string('url',120)->index();
            $table->string('alt',300);
            $table->string('image',255)->nullable();
            $table->tinyInteger('sort')->default(0);
            // sort number: 0 -> 6
            //0. 1300 x 804
            //1. 655 x 283
            //2. 655 x 283
            //3. 300 x 264
            //4. 300 x 264
            //5. 358 x 205
            //6. 358 x 205
            $table->tinyInteger('active')->default(1);
            $table->tinyInteger('isDelete')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('banners');
    }
}
