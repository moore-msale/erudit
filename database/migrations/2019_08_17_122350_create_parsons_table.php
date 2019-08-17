<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParsonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parsons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type');
            $table->string('urlForParse');
            $table->string('searchUrl')->nullable();
            $table->string('name_search')->nullable();
            $table->string('name_search_count')->nullable();
            $table->string('name_url')->nullable();
            $table->string('name_url_count')->nullable();
            $table->string('author')->nullable();
            $table->string('author_count')->nullable();
            $table->string('excel')->nullable();
            $table->string('name');
            $table->string('name_count')->nullable();
            $table->string('description')->nullable();
            $table->string('description_count')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('parsons');
    }
}
