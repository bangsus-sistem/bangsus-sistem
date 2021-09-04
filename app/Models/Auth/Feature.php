<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;
use Bsb\Foundation\Database\Eloquent\AuthModel;
use App\Models\Log\ActivityLog;

class Feature extends Model implements AuthModel
{
    /**
     * @var boolean
     */
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function action()
    {
        return $this->belongsTo(Action::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function roles()
    {
        return $this->morphToMany(Role::class, 'role_authorizations');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function activityLogs()
    {
        return $this->morphMany(ActivityLog::class, 'activity_log');
    }

    /**
     * @param  array  $refs
     * @return mixed
     */
    public static function getAuthorization($refs)
    {
        return static::whereHas('module',
            fn ($query) => $query->where('ref', $refs['module'])
        )
            ->whereHas('action', 
                fn ($query) => $query->where('ref', $refs['action'])
            )
            ->first();
    }
}
