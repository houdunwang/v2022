<?php

namespace App\Observers;

use App\Models\Site;

class SiteObserver
{
    public function creating(Site $site)
    {
        $site->config = config('site');
    }

    public function created(Site $site)
    {
    }

    public function updated(Site $site)
    {
    }

    public function deleted(Site $site)
    {
    }

    /**
     * Handle the Site "restored" event.
     *
     * @param  \App\Models\Site  $site
     * @return void
     */
    public function restored(Site $site)
    {
        //
    }

    /**
     * Handle the Site "force deleted" event.
     *
     * @param  \App\Models\Site  $site
     * @return void
     */
    public function forceDeleted(Site $site)
    {
        //
    }
}
