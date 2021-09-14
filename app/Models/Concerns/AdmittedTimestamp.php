<?php

namespace App\Models\Concerns;

trait AdmittedTimestamp
{
    /**
     * @return void
     */
    public function initializeAdmittedTimestamp()
    {
        $this->addObservableEvents([
            'admitting', 'admitted', 'unadmitting', 'unadmitted'
        ]);
    }

    
    /**
     * Post the data row.
     * 
     * @return mixed
     */
    public function admit()
    {
        $this->fireModelEvent('admitting');

        $this->admitted_at = $this->freshTimestamp();
        $result = $this->saveQuietly();

        $this->fireModelEvent('admitted');

        return $result;
    }

    /**
     * Unadmitt the data row.
     * 
     * @return mixed
     */
    public function unadmit()
    {
        $this->fireModelEvent('unadmitting');

        $this->admitted_at = null;
        $result = $this->saveQuietly();

        $this->fireModelEvent('unadmitted', false);

        return $result;
    }

    /**
     * Scope the admitted data.
     * 
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeIsAdmitted($query)
    {
        return $query->whereNotNull('admitted_at');
    }

    /**
     * Scope the not admitted data.
     * 
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeIsNotAdmitted($query)
    {
        return $query->whereNull('admitted_at');
    }

    /**
     * Determine if the row has been admitted.
     * 
     * @return bool
     */
    public function hasBeenAdmitted()
    {
        return ! is_null($this->admitted_at);
    }

    /**
     * Determine if the row hasn't been admitted.
     * 
     * @return bool
     */
    public function hasntBeenAdmitted()
    {
        return ! $this->hasBeenAdmitted();
    }

    /**
     * Register a "admitting" model event callback with the dispatcher.
     * 
     * @param  \Closure|string  $callback
     * @return void
     */
    public static function admitting($callback)
    {
        static::registerModelEvent('admitting', $callback);
    }

    /**
     * Register a "admitted" model event callback with the dispatcher.
     * 
     * @param  \Closure|string  $callback
     * @return void
     */
    public static function admitted($callback)
    {
        static::registerModelEvent('admitted', $callback);
    }

    /**
     * Register a "unadmitting" model event callback with the dispatcher.
     * 
     * @param  \Closure|string  $callback
     * @return void
     */
    public static function unadmitting($callback)
    {
        static::registerModelEvent('unadmitting', $callback);
    }

    /**
     * Register a "unadmitted" model event callback with the dispatcher.
     * 
     * @param  \Closure|string  $callback
     * @return void
     */
    public static function unadmitted($callback)
    {
        static::registerModelEvent('unadmitted', $callback);
    }

    /**
     * Get the admitted status.
     * 
     * @return bool
     */
    public function getAdmittedAttribute()
    {
        return ! is_null($this->admitted_at);
    }
}
