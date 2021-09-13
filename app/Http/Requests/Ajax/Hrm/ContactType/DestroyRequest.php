<?php

namespace App\Http\Requests\Ajax\Hrm\ContactType;

use App\Http\Requests\FeatureIdRequest;
use App\Models\Hrm\ContactType;

class DestroyRequest extends FeatureIdRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'contact_type',
        'action' => 'delete',
    ];

    /**
     * @return string
     */
    protected function model()
    {
        return ContactType::class;
    }
}
