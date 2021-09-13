<?php

namespace App\Http\Requests\Ajax\Hrm\BloodType;

use App\Http\Requests\FeatureRequest;

class ShowRequest extends FeatureRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'blood_type',
        'action' => 'read',
    ];
}
