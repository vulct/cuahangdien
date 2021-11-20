<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_attributes', function (Blueprint $table) {
            $table->id();
            $table->string('type_name', 120)->nullable();
            $table->string('codename', 120);
            $table->string('size', 120)->nullable();
            $table->decimal('price', 13)->nullable()->default(null);
            $table->decimal('discount', 13)->nullable()->default(null);
            $table->tinyInteger('isDelete')->default(0);
            $table->timestamps();
        });

        Schema::table('product_attributes', function (Blueprint $table) {
            $table->foreignId('product_id')
                ->nullable()->default(null)
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
        Schema::dropIfExists('product_attributes');
    }
}
