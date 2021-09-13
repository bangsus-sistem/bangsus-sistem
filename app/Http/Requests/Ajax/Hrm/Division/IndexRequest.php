<?php

namespace App\Http\Requests\Ajax\Hrm\Division;

use App\Http\Requests\FeatureRequest;

class IndexRequest extends FeatureRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'division',
        'action' => 'index',
    ];
}
