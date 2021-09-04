<?php

namespace App\Widgets\Log\ActivityLog;

use Bsb\Foundation\Widget;
use App\Models\Log\ActivityLog;

class LatestWidget extends Widget
{
    /**
     * @param  \App\Http\Requests\Ajax\Log\ActivityLog\RevealLatestRequest  $request
     * @return mixed
     */
    public function touch($request)
    {
        return ActivityLog::with('user', 'activityLog')->latest()->take(5)->get();
    }
}
