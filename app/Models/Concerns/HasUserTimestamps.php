<?php

namespace App\Models\Concerns;

use Illuminate\Support\Facades\Auth;
use App\Models\Auth\User;

trait HasUserTimestamps
{
    /**
     * @return void
     */
    public static function bootHasUserTimestamps()
    {
        static::creating(function ($model) {
            $user = Auth::user();
            if ( ! is_null($user)) $model->user_create_id = $user->id;
        });
        static::updating(function ($model) {
            $user = Auth::user();
            if ( ! is_null($user)) $model->user_update_id = $user->id;
        });
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userCreate()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userUpdate()
    {
        return $this->belongsTo(User::class);
    }
}
