<?php

namespace App\Http\Requests\Ajax\Hrm\BloodType;

use App\Http\Requests\FeatureIdRequest;
use App\Models\Hrm\BloodType;

class ReviseActivationRequest extends FeatureIdRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'blood_type',
        'action' => 'update',
    ];

    /**
     * @return string
     */
    protected function model()
    {
        return BloodType::class;
    }
}
