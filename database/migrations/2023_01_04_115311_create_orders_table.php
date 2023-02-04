<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('productId')->nullable();
            $table->integer('userId')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('totalPrice')->nullable();
            $table->string('name', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('phone', 255)->nullable();
            $table->string('city', 255)->nullable();
            $table->string('district', 255)->nullable();
            $table->text('address')->nullable();
            $table->enum('payment', ['BCA', 'MANDIRI', 'BNI' , 'COD'])->nullable();
            $table->enum('status', ['newOrder', 'payOrder', 'paidOrder' , 'packingOrder' , 'deliveryOrder', 'successOrder'])->nullable();
            $table->enum('type', ['online', 'offline'])->nullable();
            $table->string('evidence', 255)->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('orders');
    }
};