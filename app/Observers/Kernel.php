<?php

namespace App\Observers;

class Kernel
{
    /**
     * @return array
     */
    public static function observers()
    {
        return [
            \App\Models\System\Branch::class => System\BranchObserver::class,
            \App\Models\Hrm\Employee::class => Hrm\EmployeeObserver::class,
            \App\Models\Hrm\EmployeeAssignment::class => Hrm\EmployeeAssignmentObserver::class,
            \App\Models\Hrm\ScheduleSubmission::class => Hrm\ScheduleSubmissionObserver::class,
        ];
    }
}
