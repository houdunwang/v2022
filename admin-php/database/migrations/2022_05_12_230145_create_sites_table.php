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
            $table->string('address', 200)->nullable()->comment('地址');
            $table->string('email', 50)->nullable()->comment('邮箱');
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
