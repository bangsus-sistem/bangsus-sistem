<?php

namespace App\Models\Concerns;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Auth\User;

trait HasUserAdmit
{
    /**
     * @return void
     */
    public static function bootHasUserAdmit()
    {
        static::admitting(function ($model) {
            $user = Auth::user();
            if ( ! is_null($user)) $model->user_admit_id = $user->id;
        });

        static::unadmitting(function ($model) {
            $user = Auth::user();
            $model->user_admit_id = null;
        });
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userAdmit()
    {
        return $this->belongsTo(User::class);
    }
}
