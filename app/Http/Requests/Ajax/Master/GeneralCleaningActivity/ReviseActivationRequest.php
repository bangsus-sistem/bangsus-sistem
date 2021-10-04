<?php

namespace App\Http\Requests\Ajax\Master\GeneralCleaningActivity;

use App\Http\Requests\FeatureIdRequest;
use App\Models\Master\GeneralCleaningActivity;

class ReviseActivationRequest extends FeatureIdRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'general_cleaning_activity',
        'action' => 'update',
    ];

    /**
     * @return string
     */
    protected function model()
    {
        return GeneralCleaningActivity::class;
    }
}
