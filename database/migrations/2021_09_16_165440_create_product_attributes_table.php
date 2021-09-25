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
            $table->string('type_name')->nullable();
            $table->string('codename');
            $table->string('size')->nullable();
            $table->decimal('price', 13, 2)->nullable()->default(null);
            $table->decimal('discount', 13, 2)->nullable()->default(null);
            $table->timestamps();
        });

        Schema::table('product_attributes', function (Blueprint $table) {
            $table->foreignId('product_id')
                ->nullable()->default(0)
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
