<?php

use App\Comment;
use App\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Comment::TABLE_NAME, function(Blueprint $table) {
            $table->increments('id');
            $table->integer('target_id'); // Для MySQL 5.0 полиморф не работает
            $table->string('target_type');
            $table->integer('user_id')->unsigned(); // Для MySQL 5.0 метод foreign() не работает
            $table->text('content');
            $table->integer('level');
            $table->boolean('status')->default(true);
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
        Schema::dropIfExists(Comment::TABLE_NAME);
    }
}