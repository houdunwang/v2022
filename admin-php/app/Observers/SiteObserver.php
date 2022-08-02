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

    public function restored(Site $site)
    {
    }

    public function forceDeleted(Site $site)
    {
    }
}
