<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTariffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tariffs', function (Blueprint $table) {
            $table->id();
            $table->string('name', 200);
            $table->string('slug', 120)->index();
            $table->string('link_download', 200)->comment('link pdf drive');
            $table->string('image', 255)->nullable();
            $table->string('language', 100)->nullable();
            $table->tinyInteger('active')->default(1);
            $table->tinyInteger('isDelete')->default(0);
            $table->timestamps();
        });

        Schema::table('tariffs', function (Blueprint $table) {
            $table->foreignId('category_id')->index()
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
        Schema::dropIfExists('tariffs');
    }
}
