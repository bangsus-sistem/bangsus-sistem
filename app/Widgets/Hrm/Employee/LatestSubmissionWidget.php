<?php

namespace App\Widgets\Hrm\Employee;

use Bsb\Foundation\Widget;
use App\Models\Hrm\Employee;

class LatestSubmissionWidget extends Widget
{
    /**
     * @param  \App\Http\Requests\Ajax\Hrm\Employee\RevealLatestRequest  $request
     * @return mixed
     */
    public function touch($request)
    {
        return Employee::isNotAdmitted()->get();
    }
}
