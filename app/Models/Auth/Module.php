<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function features()
    {
        return $this->hasMany(Feature::class);
    }
}
