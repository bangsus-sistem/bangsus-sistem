<?php

namespace App\Http\Requests\Ajax\System\Branch;

use App\Http\Requests\FeatureRequest;

class IndexRequest extends FeatureRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'branch',
        'action' => 'index',
    ];
}
