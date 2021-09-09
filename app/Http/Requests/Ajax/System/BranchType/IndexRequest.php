<?php

namespace App\Http\Requests\Ajax\System\BranchType;

use App\Http\Requests\FeatureRequest;

class IndexRequest extends FeatureRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'branch_type',
        'action' => 'index',
    ];
}
