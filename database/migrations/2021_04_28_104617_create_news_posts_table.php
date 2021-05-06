<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_posts', function (Blueprint $table) {
            $table->id();
          /* We started adding code here*/
            $table->string('title')->unique();
            $table->string('slug')->nullable()->default(null);// Title of our blog post  
            $table->text('body');   // Body of our blog post
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');   
            //$table->integer('user_id')->nullable()->default('0');// user_id of our blog post author
            $table->enum('status', ['active', 'inactive'])->default('active');
          /* We stopped adding code here*/
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
        Schema::dropIfExists('news_posts');
    }
}
