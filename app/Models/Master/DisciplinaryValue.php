<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;

class DisciplinaryValue extends Model
{
    /**
     * @var bool
     */
    public $timestamps = false;
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function disciplinaryParameter()
    {
        return $this->belongsTo(DisciplinaryParameter::class);
    }
}
