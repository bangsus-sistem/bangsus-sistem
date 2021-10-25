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
            \App\Models\Master\OperationalPhotoType::class => Master\OperationalPhotoTypeObserver::class,
            \App\Models\Operational\OperationalPhoto::class => Operational\OperationalPhotoObserver::class,
            \App\Models\Penalty\CommonPenalty::class => Penalty\CommonPenaltyObserver::class,
            \App\Models\Penalty\MaterialPenalty::class => Penalty\MaterialPenaltyObserver::class,
        ];
    }
}
