<?php

namespace App\Models\Concerns;

trait ActiveFlag
{
    /**
     * @return void
     */
    protected function initializeActiveFlag()
    {
        $this->casts['active'] = 'boolean';
    }

    /**
     * @param  \Illuminate\Database\Eloquent\Builder
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('active', true);
    }

    /**
     * @param  \Illuminate\Database\Eloquent\Builder
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeInactive($query)
    {
        return ! $query->active();
    }

    /**
     * @return boolean
     */
    public function isActive()
    {
        return $this->active;
    }

    /**
     * @return boolean
     */
    public function isInactive()
    {
        return ! $this->active;
    }
}
