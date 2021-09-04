<?php

namespace App\Models\Concerns;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Auth\User;

trait HasUserDelete
{
    /**
     * @return void
     */
    public static function bootHasUserDelete()
    {
        static::deleting(function ($model) {
            $user = Auth::user();
            if ( ! is_null($user)) $model->user_delete_id = $user->id;
            $model->saveQuietly();
        });

        static::restoring(function ($model) {
            $user = Auth::user();

            if ($model->timestamps) {
                $model->created_at = Carbon::now();
                $model->updated_at = null;
            }
            
            $model->user_delete_id = null;
            $model->save();
        });
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userDelete()
    {
        return $this->belongsTo(User::class);
    }
}
