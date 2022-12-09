<?php

namespace App\Observers;

use App\Models\Topic;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;

class TopicObserver
{
    /**
     * Handle the Topic "created" event.
     *
     * @param  \App\Models\Topic  $topic
     * @return void
     */
    public function created(Topic $topic)
    {
        activity()
            ->performedOn($topic)
            ->causedBy($topic->user)
            ->withProperties(['type' => 'topic', 'id' => $topic->id])
            ->log('');
    }

    /**
     * Handle the Topic "updated" event.
     *
     * @param  \App\Models\Topic  $topic
     * @return void
     */
    public function updated(Topic $topic)
    {
        //
    }

    /**
     * Handle the Topic "deleted" event.
     *
     * @param  \App\Models\Topic  $topic
     * @return void
     */
    public function deleted(Topic $topic)
    {
        $topic->comments()->delete();
        Activity::where('subject_type', 'App\Models\Topic')->where('subject_id', $topic->id)->delete();
    }

    /**
     * Handle the Topic "restored" event.
     *
     * @param  \App\Models\Topic  $topic
     * @return void
     */
    public function restored(Topic $topic)
    {
        //
    }

    /**
     * Handle the Topic "force deleted" event.
     *
     * @param  \App\Models\Topic  $topic
     * @return void
     */
    public function forceDeleted(Topic $topic)
    {
        //
    }
}
