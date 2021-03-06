<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
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
            $table->string('code');
            $table->unsignedBigInteger('user_id');
            $table->float('total');
            $table->float('discount');
            $table->string('note',255)->nullable();
            $table->string('shipping_to');
            $table->string('shipping_to_contact');
            $table->string('shipping_address');
            $table->string('shipping_city');
            $table->string('shipping_district');
            $table->string('shipping_post_code');
            $table->enum('status',['pending','confirmed','completed','cancelled'])->default('pending');
            $table->unsignedBigInteger('transaction_id');
            $table->unsignedBigInteger('order_tracking_id');
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('transaction_id')
                ->references('id')
                ->on('transactions')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('order_tracking_id')
                ->references('id')
                ->on('order_trackings')
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
        Schema::dropIfExists('orders');
    }
}
