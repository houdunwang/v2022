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
        Schema::create('sites', function (Blueprint $table) {
            $table->id();
            $table->string('title', 50)->unique()->comment('网站名称');
            $table->string('url', 100)->nullable()->comment('网址');
            $table->json('config')->comment('站点配置项');
            $table->bigInteger('module_id')->nullable()->comment('默认模块');
            $table->foreignId('user_id')->constrained()->comment('用户id');
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
        Schema::dropIfExists('sites');
    }
};
