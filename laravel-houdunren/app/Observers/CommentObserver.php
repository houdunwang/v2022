<?php

namespace App\Observers;

use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;

class CommentObserver
{
    /**
     * Handle the Comment "created" event.
     *
     * @param  \App\Models\Comment  $comment
     * @return void
     */
    public function created(Comment $comment)
    {
        activity()
            ->performedOn($comment)
            ->causedBy($comment->user)
            ->withProperties(['type' => 'comment', 'id' => $comment->id, 'model' => [
                'id' => $comment->commentable_id,
                'type' => explode('\\', $comment->commentable_type)[2],
            ]])
            ->log('');
    }

    /**
     * Handle the Comment "updated" event.
     *
     * @param  \App\Models\Comment  $comment
     * @return void
     */
    public function updated(Comment $comment)
    {
        //
    }

    /**
     * Handle the Comment "deleted" event.
     *
     * @param  \App\Models\Comment  $comment
     * @return void
     */
    public function deleted(Comment $comment)
    {
        Activity::where('subject_type', 'App\Models\Comment')->where('subject_id', $comment->id)->delete();
    }

    /**
     * Handle the Comment "restored" event.
     *
     * @param  \App\Models\Comment  $comment
     * @return void
     */
    public function restored(Comment $comment)
    {
        //
    }

    /**
     * Handle the Comment "force deleted" event.
     *
     * @param  \App\Models\Comment  $comment
     * @return void
     */
    public function forceDeleted(Comment $comment)
    {
        //
    }
}
