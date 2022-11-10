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
        //user_id  - users id  user id users
        //reply_user_id   reply_users
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->text('content')->comment('评论内容');
            $table->morphs('commentable');
            $table->foreignId('comment_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('reply_user_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
        //commentable_type App\Models\Topic   commentable_id 1
        //commentable_type App\Models\Video   commentable_id 2
        //你好 向军：2    id:1 user_id:2 content:你好
        //你也好 李四:5   id:2 user_id:5  content: 你也好 comment_id:1 reply_user_id:2
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
};
