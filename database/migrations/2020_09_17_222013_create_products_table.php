<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('SKU')->unique()->nullable();
            $table->string('description');
            $table->json('tags');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('sub_category_id')->nullable();
            $table->float('weight_in_kg')->nullable();
            $table->float('dimension_in_meter_cube')->nullable();
            $table->integer('quantity')->nullable();
            $table->float('price');
            $table->float('discounted_price')->nullable();
            $table->string('purchase_note')->nullable();
            $table->boolean('in_stock');
            $table->boolean('is_active');
            $table->boolean('is_featured');
            $table->timestamp('sale_started_at')->nullable();
            $table->timestamp('sale_ended_at')->nullable();
            $table->timestamps();

            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onUpdate('cascade')
                ->onDelete('set null');
            $table->foreign('sub_category_id')
                ->references('id')
                ->on('sub_categories')
                ->onUpdate('cascade')
                ->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
