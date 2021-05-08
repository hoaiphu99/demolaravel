<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateDb extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $date = new DateTime();
        $unixTimestamp = $date->getTimestamp();

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username', 20);
            $table->string('password', 50);
            $table->string('name', 50);
            $table->string('email', 50)->nullable();
            $table->string('phone', 50)->nullable();
            $table->string('birthday', 50)->nullable();
            $table->integer('created')->unsigned();

        });
        DB::table('users')->insert([
            [
                'username' => 'admin',
                'password' => '123',
                'name' => 'Hoai Phu',
                'email' => 'phu@gmail.com',
                'phone' => '0383875674',
                'birthday' => '08/11/1999',
                'created' => $unixTimestamp
            ],
            [
                'username' => 'minhthang',
                'password' => '123',
                'name' => 'Minh Thang',
                'email' => 'thang@gmail.com',
                'phone' => '0123432431',
                'birthday' => '20/11/1999',
                'created' => $unixTimestamp
            ],
        ]);

        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('description', 500);
            $table->integer('created')->unsigned();

        });
        DB::table('categories')->insert([
            [
                'name' => 'Anime',
                'description' => 'Anime',
                'created' => $unixTimestamp
            ]
        ]);

        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->string('description', 500);
            $table->string('image', 100);
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('cate_id')->unsigned();
            $table->integer('created')->unsigned();

        });
        Schema::table('posts', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('cate_id')->references('id')->on('categories');
        });
        DB::table('posts')->insert([
            [
                'title' => 'test',
                'description' => 'test',
                'image' => '1.jpg',
                'user_id' => 1,
                'cate_id' => 1,
                'created' => $unixTimestamp
            ]
        ]);

        Schema::create('likes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('post_id')->unsigned();
            $table->integer('created')->unsigned();

        });
        Schema::table('likes', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('post_id')->references('id')->on('posts');
        });
        DB::table('likes')->insert([
            [
                'user_id' => 1,
                'post_id' => 1,
                'created' => $unixTimestamp
            ]
        ]);

        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string('content', 500);
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('post_id')->unsigned();
            $table->integer('created')->unsigned();

        });
        Schema::table('comments', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('post_id')->references('id')->on('posts');
        });
        DB::table('comments')->insert([
            [
                'content' => 'alo aloo alooo',
                'user_id' => 1,
                'post_id' => 1,
                'created' => $unixTimestamp
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('posts');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('likes');
        Schema::dropIfExists('comments');
    }
}
