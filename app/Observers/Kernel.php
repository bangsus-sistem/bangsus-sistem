<?php

namespace App\Observers;

class Kernel
{
    /**
     * @var array
     */
    public static $observers = [
        \App\Models\Hrm\Employee::class => Hrm\EmployeeObserver::class,
        \App\Models\Hrm\EmployeeAssignment::class => Hrm\EmployeeAssignmentObserver::class,
    ];
}
