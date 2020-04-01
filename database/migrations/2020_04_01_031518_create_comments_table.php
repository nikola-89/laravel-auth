<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
			$table->unsignedBigInteger('post_id');
			$table->foreign('post_id')
				->references('id')
				->on('posts')
				->onDelete('cascade')
				->onUpdate('cascade');
			$table->char('name', 50);
			$table->char('email', 80);
			$table->char('title', 100);
			$table->char('body', 200);
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
        Schema::dropIfExists('comments');
    }
}
