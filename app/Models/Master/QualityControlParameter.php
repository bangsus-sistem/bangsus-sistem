<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;

class QualityControlParameter extends Model
{
    /**
     * @var bool
     */
    public $timestamps = false;
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function qualityControlType()
    {
        return $this->belongsTo(DisciplinaryType::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function qualityControlValues()
    {
        return $this->hasMany(QualityControlValue::class);
    }
}
