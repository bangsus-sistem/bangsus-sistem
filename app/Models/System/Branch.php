<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\{
    Model,
    SoftDeletes,
};
use App\Models\Concerns\{
    Geometry,
    HasUserTimestamps,
    HasUserDelete,
    ActiveFlag,
    HiddenFlag,
    LockedFlag,
};
use Illuminate\Support\Facades\Auth;
use App\Models\Auth\User;
use App\Models\Master\MinimumOperationalPhoto;

class Branch extends Model
{
    use SoftDeletes, Geometry, HasUserTimestamps, HasUserDelete, ActiveFlag,
        HiddenFlag, LockedFlag;

    /**
     * List of geometry fields.
     * 
     * @var array
     */
    protected $geometry = ['position'];

    /**
     * Select geometrical attributes as text from database.
     *
     * @var bool
     */
    protected $geometryAsText = true;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function branchType()
    {
        return $this->belongsTo(BranchType::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function minimumOperationalPhotos()
    {
        return $this->hasMany(MinimumOperationalPhoto::class);
    }

    /**
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeUserAuthorized($query)
    {
        return $query->whereIn('id', Auth::user()->branches->pluck('id')->all());
    }
}
