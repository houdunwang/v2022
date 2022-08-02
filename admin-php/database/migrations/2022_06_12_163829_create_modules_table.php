<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('modules', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('模块标识');
            $table->string('name')->comment('模块标识');
            $table->string('version')->comment('模块标识');
            $table->string('author')->comment('模块标识');
            $table->string('preview')->nullable()->comment('模块标识');
            $table->boolean('admin')->default(true)->comment('管理后台');
            $table->boolean('front')->default(true)->comment('前台访问');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('modules');
    }
};
