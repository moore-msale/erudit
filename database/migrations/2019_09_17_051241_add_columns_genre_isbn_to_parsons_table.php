<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsGenreIsbnToParsonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('parsons', function (Blueprint $table) {
            $table->string('isbn')->nullable();
            $table->integer('isbn_count')->nullable();
            $table->string('genre')->nullable();
            $table->integer('genre_count')->nullable();
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
            $table->dropColumn(['isbn', 'isbn_count', 'genre', 'genre_count']);
        });
    }
}
