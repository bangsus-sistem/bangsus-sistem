<?php

namespace App\Widgets\Log\ActivityLog;

use Bsb\Foundation\Widget;
use App\Models\Log\ActivityLog;
use Carbon\Carbon;

class TrafficWidget extends Widget
{
    /**
     * @param  \App\Http\Requests\Ajax\Log\ActivityLog\RevealTrafficRequest  $request
     * @return mixed
     */
    public function touch($request)
    {
        $timestamp = $request->input('timestamp', 300);

        $usersCount = \DB::table('activity_logs')
            ->where('created_at', '>=', Carbon::now()->subSeconds($timestamp))
            ->distinct('user_id')
            ->count();
        $count = \DB::table('activity_logs')
            ->where('created_at', '>=', Carbon::now()->subSeconds($timestamp))
            ->count();

        return [
            'users_count' => $usersCount,
            'count' => $count,
        ];
    }
}
