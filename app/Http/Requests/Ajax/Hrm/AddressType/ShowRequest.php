<?php

namespace App\Http\Requests\Ajax\Hrm\AddressType;

use App\Http\Requests\FeatureRequest;

class ShowRequest extends FeatureRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'address_type',
        'action' => 'read',
    ];
}
