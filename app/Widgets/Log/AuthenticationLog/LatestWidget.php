<?php

namespace App\Widgets\Log\AuthenticationLog;

use Bsb\Foundation\Widget;
use App\Models\Log\AuthenticationLog;

class LatestWidget extends Widget
{
    /**
     * @param  \App\Http\Requests\Ajax\Log\AuthenticationLog\RevealLatestRequest  $request
     * @return mixed
     */
    public function touch($request)
    {
        return AuthenticationLog::with('user')->latest()->take(5)->get();
    }
}
