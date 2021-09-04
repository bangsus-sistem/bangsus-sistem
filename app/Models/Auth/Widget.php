<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;
use Bsb\Foundation\Database\Eloquent\AuthModel;
use App\Models\Log\ActivityLog;

class Widget extends Model implements AuthModel
{
    /**
     * @var boolean
     */
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function package()
    {
        return $this->belongsTo(Package::class);
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
        return static::where('ref', $refs['widget'])
            ->first();
    }
}
