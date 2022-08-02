<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('systems', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100)->comment('系统名称');
            $table->string('tel')->nullable()->comment('电话');
            $table->string('logo')->nullable()->comment('logo');
            $table->string('email')->nullable()->comment('邮箱');
            $table->string('address')->nullable()->comment('地址');
            $table->string('wechat')->nullable()->comment('微信');
            $table->string('qq')->nullable()->comment('QQ');
            $table->string('icp')->nullable()->comment('备案号');
            $table->string('copyright')->nullable()->comment('版权');
            $table->json('config')->nullable()->comment('配置');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('systems');
    }
};
