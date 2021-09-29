<?php

namespace App\Http\Requests\Ajax\Master\GeneralCleaningActivity;

use App\Http\Requests\FeatureRequest;

class IndexRequest extends FeatureRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'general_cleaning_activity',
        'action' => 'index',
    ];
}
