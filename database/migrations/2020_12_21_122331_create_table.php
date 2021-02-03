<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topics', function (Blueprint $table) {
           $table->increments('id');
           $table->string('topicname', 128)->unique();
           $table->timestamps();
        });

        // Хорошим тоном является создание таблицы в отдельном файле, но пока мы сделаем в одном
        Schema::create('blocks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 128);
            $table->longText('content');
            $table->string('imagepath', 255)->nullable();
            $table->integer('topicid')->unsigned();
            $table->foreign('topicid')->references('id')->on('topics')->onDelete('cascade');
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
        Schema::dropIfExists('blocks');
        Schema::dropIfExists('topics');
    }
}
