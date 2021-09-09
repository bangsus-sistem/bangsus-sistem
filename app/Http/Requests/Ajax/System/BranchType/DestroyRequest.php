<?php

namespace App\Http\Requests\Ajax\System\BranchType;

use App\Http\Requests\FeatureIdRequest;
use App\Models\System\BranchType;

class DestroyRequest extends FeatureIdRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'branch_type',
        'action' => 'delete',
    ];

    /**
     * @return string
     */
    protected function model()
    {
        return BranchType::class;
    }
}
