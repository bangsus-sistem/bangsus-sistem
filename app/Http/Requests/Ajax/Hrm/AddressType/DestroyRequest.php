<?php

namespace App\Http\Requests\Ajax\Hrm\AddressType;

use App\Http\Requests\FeatureIdRequest;
use App\Models\Hrm\AddressType;

class DestroyRequest extends FeatureIdRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'address_type',
        'action' => 'delete',
    ];

    /**
     * @return string
     */
    protected function model()
    {
        return AddressType::class;
    }
}
