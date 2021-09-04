<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    /**
     * @var boolean
     */
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function modules()
    {
        return $this->hasMany(Module::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function widgets()
    {
        return $this->hasMany(Widget::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reports()
    {
        return $this->hasMany(Report::class);
    }
}
