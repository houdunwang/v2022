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
        Schema::create('systems', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('标题');
            $table->string('description')->comment('介绍');
            $table->string('preview')->comment('预览图');
            $table->unsignedSmallInteger('lesson_count')->default(0)->comment('课程数量');
            $table->unsignedSmallInteger('video_count')->default(0)->comment('视频数量');
            $table->unsignedSmallInteger('order')->default(0)->comment('排序');
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
        Schema::dropIfExists('systems');
    }
};
