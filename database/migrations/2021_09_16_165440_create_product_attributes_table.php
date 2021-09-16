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
            $table->string('type_name');
            $table->string('codename');
            $table->decimal('price_list', 13, 2)->nullable()->default(null);
            $table->string('discount', 255)->nullable()->default(null);
            $table->decimal('price_sale', 13, 2)->nullable()->default(null);
            $table->integer('active')->default(1);
            $table->integer('isDelete')->default(0);
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
        Schema::dropIfExists('product_attributes');
    }
}
