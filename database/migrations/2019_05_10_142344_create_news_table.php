<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
			$table->string('title', 100);
			$table->string('author', 100)->nullable();
			$table->text('content')->nullable();
			$table->text('description')->nullable();
			$table->dateTime('publishedAt')->nullable();
			$table->string('url', 255)->nullable();
			$table->string('image', 150)->nullable();
			$table->string('source_name', 150)->nullable();
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
        Schema::dropIfExists('news');
    }
}
