<?php

namespace App\Http\Requests\Ajax\Hrm\Employee;

use App\Http\Requests\WidgetRequest;

class RevealLatestSubmissionRequest extends WidgetRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'widget' => 'latest_employee_submission',
    ];
}
