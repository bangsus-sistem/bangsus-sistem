<?php

namespace App\Http\Requests\Ajax\Hrm\Gender;

use App\Http\Requests\FeatureIdRequest;
use App\Models\Hrm\Gender;

class DestroyRequest extends FeatureIdRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'gender',
        'action' => 'delete',
    ];

    /**
     * @return string
     */
    protected function model()
    {
        return Gender::class;
    }
}
