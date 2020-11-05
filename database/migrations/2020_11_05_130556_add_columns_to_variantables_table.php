<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToVariantablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('variantables', function (Blueprint $table) {
            $table->float('price')->nullable();
            $table->float('discounted_price')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('variantables', function (Blueprint $table) {
            $table->dropColumn('price')->nullable();
            $table->dropColumn('discounted_price')->nullable();
        });
    }
}
