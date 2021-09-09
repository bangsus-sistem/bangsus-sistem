<?php

namespace App\Http\Requests\Ajax\System\Branch;

use App\Http\Requests\FeatureIdRequest;
use App\Models\System\Branch;

class DestroyRequest extends FeatureIdRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'branch',
        'action' => 'delete',
    ];

    /**
     * @return string
     */
    protected function model()
    {
        return Branch::class;
    }
}
