<?php

namespace App\Http\Requests\Ajax\Hrm\ContactType;

use App\Http\Requests\FeatureIdRequest;
use App\Models\Hrm\ContactType;

class ReviseActivationRequest extends FeatureIdRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'contact_type',
        'action' => 'update',
    ];

    /**
     * @return string
     */
    protected function model()
    {
        return ContactType::class;
    }
}
