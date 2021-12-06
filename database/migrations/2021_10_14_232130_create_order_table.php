<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->string('email',120);
            $table->string('name', 120);
            $table->string('phone', 120);
            $table->string('city',120);
            $table->string('province', 120);
            $table->string('address', 255);
            $table->string('description', 255);
            $table->decimal('total', 13);
            $table->tinyInteger('payment_status')->default(0);
            $table->tinyInteger('shipping_status')->default(0);
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
            #Status
            //0. Đang xử lý
            //1. Đang báo giá
            //2. Đã báo giá
            //3. Đang giao hàng
            //4. Đã thanh toán
            //5. Chưa thanh toán
            //6. Thành công
            //7. Huỷ
        });

        Schema::table('order', function (Blueprint $table) {
            $table->foreignId('shipping_method_id')
                ->nullable()->default(null)->index()
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
        Schema::dropIfExists('order');
    }
}
