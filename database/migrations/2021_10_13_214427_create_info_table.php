<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info', function (Blueprint $table) {
            $table->id();
            $table->string('name', 200)->nullable(); // ten website
            $table->string('keyword', 255)->nullable();
            $table->string('description', 255)->nullable();
            $table->string('logo', 200)->nullable();
            $table->string('icon', 255)->nullable();
            $table->string('hotline1', 255)->nullable(); // hỗ trợ tư vấn / hotline 1 / sale 01
            $table->string('hotline2', 255)->nullable(); // hotline 2
            $table->string('phone', 15)->nullable(); // phone / ky thuat
            $table->string('address', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('tax_code', 255)->nullable();
            $table->string('business_license', 255)->nullable();
            $table->string('map_address', 255)->nullable();
            $table->string('map_iframe', 255)->nullable();
            // contact
            $table->string('facebook', 255)->nullable();
            $table->string('zalo', 255)->nullable();
            $table->string('sale', 255)->nullable(); // sale 02
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
        Schema::dropIfExists('info');
    }
}
