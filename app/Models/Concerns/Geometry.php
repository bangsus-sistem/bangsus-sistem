<?php

namespace App\Models\Concerns;

trait Geometry
{
    /**
     * Get a new query builder for the model's table.
     * Manipulate in case we need to convert geometrical fields to text.
     *
     * @param  bool $excludeDeleted
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function newQuery($excludeDeleted = true)
    {
        if (!empty($this->geometry) && $this->geometryAsText === true)
        {
            $raw = '';
            foreach ($this->geometry as $column)
            {
                $raw .= 'AsText(`' . $this->table . '`.`' . $column . '`) as `' . $column . '`, ';
            }
            $raw = substr($raw, 0, -2);

            return parent::newQuery($excludeDeleted)->addSelect('*', \DB::raw($raw));
        }

        return parent::newQuery($excludeDeleted);
    }

    /**
     * Convert point data type to array
     * 
     * @param  string  $point
     * @return array
     */
    public static function pointToArray(string $point) : array
    {
        return explode(' ', explode(')', explode('POINT(', $point)[1])[0]);
    }
}
