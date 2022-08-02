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
            $table->string('title', 100)->comment('站点名称');
            $table->string('url', 100)->unique()->nullable()->comment('网址');
            $table->string('tel')->nullable()->comment('电话');
            $table->string('email')->nullable()->comment('邮箱');
            $table->string('address')->nullable()->comment('地址');
            $table->string('wechat')->nullable()->comment('微信');
            $table->string('qq')->nullable()->comment('QQ');
            $table->string('icp')->nullable()->comment('备案号');
            $table->string('copyright')->nullable()->comment('版权');
            $table->string('logo')->nullable()->comment('logo');
            $table->string('description')->nullable()->comment('描述');
            $table->string('keywords')->nullable()->comment('关键字');
            $table->bigInteger('module_id')->nullable()->comment('站点模块');
            $table->json('config')->nullable()->comment('配置');
            $table->foreignId('user_id')->constrained()->comment('用户ID');
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
