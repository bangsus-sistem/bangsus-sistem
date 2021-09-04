<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    /**
     * @var boolean
     */
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function features()
    {
        return $this->hasMany(Feature::class);
    }
}
