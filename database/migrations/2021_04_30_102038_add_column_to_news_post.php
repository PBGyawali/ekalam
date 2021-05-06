<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToNewsPost extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('news_posts', function (Blueprint $table) {
            //
            $table->string('summary')->nullable()->default(null);
            $table->text('description')->nullable()->default(null);
            $table->foreignId('category_id')->references('id')->on('categories')->default('1');
            $table->text('image')->nullable()->default(null);
            $table->string('location')->nullable()->default(null);
            $table->string('source')->nullable()->default(null);
            $table->string('state')->nullable()->default(null);
            $table->boolean('featured')->default(false);
            $table->dateTimeTz('news_date')->nullable()->default(null);
            $table->string('slug')->nullable()->default(null);// Title of our blog post
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');   
            //$table->integer('user_id')->nullable()->default('0');// user_id of our blog post author
            $table->enum('status', ['active', 'inactive'])->default('active'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('news_posts', function (Blueprint $table) {
            //
            $table->dropColumn('source', 'summary');
        });
    }
}
