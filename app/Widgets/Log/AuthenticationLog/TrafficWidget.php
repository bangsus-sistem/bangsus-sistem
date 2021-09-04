<?php

namespace App\Widgets\Log\AuthenticationLog;

use Bsb\Foundation\Widget;
use App\Models\Log\AuthenticationLog;
use Carbon\Carbon;

class TrafficWidget extends Widget
{
    /**
     * @param  \App\Http\Requests\Ajax\Log\AuthenticationLog\RevealTrafficRequest  $request
     * @return mixed
     */
    public function touch($request)
    {
        $timestamp = $request->input('timestamp', 300);

        $usersCount = \DB::table('authentication_logs')
            ->where('created_at', '>=', Carbon::now()->subSeconds($timestamp))
            ->distinct('user_id')
            ->count();
        $loginsCount = \DB::table('authentication_logs')->where('state', true)
            ->where('created_at', '>=', Carbon::now()->subSeconds($timestamp))
            ->count();
        $logoutsCount = \DB::table('authentication_logs')->where('state', false)
            ->where('created_at', '>=', Carbon::now()->subSeconds($timestamp))
            ->count();

        return [
            'users_count' => $usersCount,
            'logins_count' => $loginsCount,
            'logouts_count' => $logoutsCount,
        ];
    }
}
