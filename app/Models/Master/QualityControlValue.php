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
     * @var array
     */
    protected $fillable = [
        'name',
        'expected_value',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'expected_value' => 'boolean',
    ];
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function qualityControlParameter()
    {
        return $this->belongsTo(DisciplinaryParameter::class);
    }
}
