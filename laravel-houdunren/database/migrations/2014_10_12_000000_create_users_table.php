<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('盾友')->comment("昵称");
            $table->string('avatar')->nullable();
            $table->string('mobile')->unique()->nullable();
            $table->string('email')->nullable()->unique();
            $table->string('password')->nullable();
            $table->string('qq')->nullable();
            $table->string('github')->nullable();
            $table->string('wakatime')->nullable();
            $table->string('douyin')->nullable();
            $table->string('wechat')->nullable();
            $table->string('weibo')->nullable();
            $table->string('unionid')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
