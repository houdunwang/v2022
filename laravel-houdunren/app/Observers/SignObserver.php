<?php

namespace App\Observers;

use App\Models\Sign;
use App\Models\SignCount;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class SignObserver
{
    /**
     * Handle the Sign "created" event.
     *
     * @param  \App\Models\Sign  $sign
     * @return void
     */
    public function created(Sign $sign)
    {
        $user = Auth::user();
        if ($user)
            SignCount::updateOrCreate(['user_id' => $user->id], [
                'year' => $user->signs()->whereYear('created_at', now())->count(),
                'month' => $user->signs()->whereYear('created_at', now())->whereMonth('created_at', now())->count(),
                'user_id' => $user->id
            ]);
    }

    /**
     * Handle the Sign "updated" event.
     *
     * @param  \App\Models\Sign  $sign
     * @return void
     */
    public function updated(Sign $sign)
    {
        //
    }

    /**
     * Handle the Sign "deleted" event.
     *
     * @param  \App\Models\Sign  $sign
     * @return void
     */
    public function deleted(Sign $sign)
    {
        //
    }

    /**
     * Handle the Sign "restored" event.
     *
     * @param  \App\Models\Sign  $sign
     * @return void
     */
    public function restored(Sign $sign)
    {
        //
    }

    /**
     * Handle the Sign "force deleted" event.
     *
     * @param  \App\Models\Sign  $sign
     * @return void
     */
    public function forceDeleted(Sign $sign)
    {
        //
    }
}
