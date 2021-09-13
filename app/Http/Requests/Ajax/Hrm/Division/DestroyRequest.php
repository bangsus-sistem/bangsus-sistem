<?php

namespace App\Http\Requests\Ajax\Hrm\Division;

use App\Http\Requests\FeatureIdRequest;
use App\Models\Hrm\Division;

class DestroyRequest extends FeatureIdRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'division',
        'action' => 'delete',
    ];

    /**
     * @return string
     */
    protected function model()
    {
        return Division::class;
    }
}
