<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsPricesToParsonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('parsons', function (Blueprint $table) {
            $table->integer('price_retail')->nullable();
            $table->integer('price_wholesale')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('parsons', function (Blueprint $table) {
            $table->dropColumn(['price_wholesale', 'price_retail']);
        });
    }
}
