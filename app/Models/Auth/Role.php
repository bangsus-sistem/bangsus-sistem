<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\{
    Model,
    SoftDeletes,
};
use App\Models\Concerns\{
    HasUserTimestamps,
    HasUserDelete,
    ActiveFlag,
    HiddenFlag,
    LockedFlag,
};

class Role extends Model
{
    use SoftDeletes, HasUserTimestamps, HasUserDelete, ActiveFlag, HiddenFlag,
        LockedFlag;

    /**
     * @var array
     */
    protected $casts = [
        'all_features' => 'boolean',
        'all_widgets' => 'boolean',
        'all_reports' => 'boolean',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphedByMany
     */
    public function features()
    {
        return $this->morphedByMany(Feature::class, 'role_authorization');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphedByMany
     */
    public function widgets()
    {
        return $this->morphedByMany(Widget::class, 'role_authorization');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphedByMany
     */
    public function reports()
    {
        return $this->morphedByMany(Report::class, 'role_authorization');
    }
}
