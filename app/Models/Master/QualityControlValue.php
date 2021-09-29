<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;

class QualityControlValue extends Model
{
    /**
     * @var bool
     */
    public $timestamps = false;
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function qualityControlParameter()
    {
        return $this->belongsTo(DisciplinaryParameter::class);
    }
}
