<?php

namespace App\Models\Hrm;

use Illuminate\Database\Eloquent\{
    Model,
    SoftDeletes,
};
use Bsb\Foundation\Database\Eloquent\Extent;
use App\Models\Concerns\{
    HasUserTimestamps,
    HasUserAdmit,
    HasUserDelete,
    HasEmployee,
    HasBranch,
    AdmittedTimestamp,
};

class EmployeeAssignment extends Model
{
    use Extent;
    use SoftDeletes, HasUserTimestamps, HasUserAdmit, HasUserDelete,
        HasEmployee, HasBranch, AdmittedTimestamp;

    /**
     * @var array
     */
    protected $casts = [
        'base_salary' => 'float',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function employeeMutations()
    {
        return $this->hasMany(EmployeeMutation::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function firstJobTitle()
    {
        return $this->belongsTo(
            JobTitle::class,
            'first_job_title_id',
            'id'
        );
    }

    /**
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeUserAuthorized($query)
    {
        return $query->whereHas('branch',
            fn ($query) => $query->userAuthorized()
        );
    }
}
