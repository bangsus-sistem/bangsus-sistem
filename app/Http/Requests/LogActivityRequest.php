<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use App\Models\Log\ActivityLog;
use Bsb\Foundation\Http\Authentication;

trait LogActivityRequest
{
    /**
     * @return void
     */
    protected function afterAuthorization()
    {
        if (config('app.bsb_foundation.log_activity')) {
            $activityLog = new ActivityLog;
            $activityLog->user_id = Auth::user()->id;

            $model = Authentication::getInstance($this->type, $this->refs);
            $model->activityLogs()->save($activityLog);
        }
    }
}
