<?php

namespace App\Http\Requests\Ajax\Operational\OperationalPhoto;

use App\Http\Requests\FeatureIdRequest;
use App\Models\Operational\OperationalPhoto;

class DestroyRequest extends FeatureIdRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'operational_photo',
        'action' => 'delete',
    ];

    /**
     * @return string
     */
    protected function model()
    {
        return OperationalPhoto::class;
    }
}
