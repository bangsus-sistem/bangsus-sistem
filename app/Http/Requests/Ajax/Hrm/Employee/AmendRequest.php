<?php

namespace App\Http\Requests\Ajax\Hrm\Employee;

use App\Http\Requests\FeatureIdRequest;
use Illuminate\Validation\Rule;
use App\Models\Hrm\{
    Employee,
    BloodType,
    Gender,
    JobTitle,
};
use App\Models\System\Branch;
use App\Validation\Callbacks\RequiredIf\EmployeeIsNotAdmittedCallback;
use App\Validation\Hrm\EmployeeAddress\ValidEmployeeAddressesRule;
use App\Validation\Hrm\EmployeeContact\ValidEmployeeContactsRule;
use App\Validation\Hrm\EmployeePhoto\ValidEmployeePhotosRule;

class AmendRequest extends FeatureIdRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'employee',
        'action' => 'update',
    ];

    /**
     * @return string
     */
    protected function model()
    {
        return Employee::class;
    }

    /**
     * @return array
     */
    public function additionalRules()
    {
        return [
            'nik' => [
                'required',
                'size:16',
                Rule::unique(Employee::class, 'nik')
                    ->ignore($this->input('id')),
            ],
            'full_name' => [
                'required',
                'max:400',
            ],
            'birth_place' => [
                'required',
                'max:200',
            ],
            'birth_date' => [
                'required',
                'date',
                'date_format:Y-m-d',
            ],
            'blood_type_id' => [
                'required',
                'bsb_exists:'.BloodType::class,
            ],
            'gender_id' => [
                'required',
                'bsb_exists:'.Gender::class,
            ],
            'first_branch_id' => [
                Rule::requiredIf(
                    EmployeeIsNotAdmittedCallback::run($this)
                ),
                'bsb_exists:'.Branch::class,
            ],
            'first_job_title_id' => [
                Rule::requiredIf(
                    EmployeeIsNotAdmittedCallback::run($this)
                ),
                'bsb_exists:'.JobTitle::class,
            ],
            'start_date' => [
                Rule::requiredIf(
                    EmployeeIsNotAdmittedCallback::run($this)
                ),
                'date',
                'date_format:Y-m-d',
            ],
            'description' => [
                'nullable',
                'max:1000',
            ],
            'note' => [
                'nullable',
                'max:1000',
            ],
            'employee_addresses.*' => [
                new ValidEmployeeAddressesRule($this),
            ],
            'employee_contacts.*' => [
                new ValidEmployeeContactsRule($this),
            ],
            'employee_photos.*' => [
                new ValidEmployeePhotosRule($this),
            ],
        ];
    }

    /**
     * @return void
     */
    protected function afterValidation()
    {
        $employeeAddresses = [];
        foreach ($this->input('employee_addresses') as $employeeAddress) {
            if (strlen($employeeAddress['address']) > 0) {
                $employeeAddresses[] = $employeeAddress;
            }
        }
        $this->merge(['employee_addresses' => $employeeAddresses]);

        $employeeContacts = [];
        foreach ($this->input('employee_contacts') as $employeeContact) {
            if (strlen($employeeContact['contact']) > 0) {
                $employeeContacts[] = $employeeContact;
            }
        }
        $this->merge(['employee_contacts' => $employeeContacts]);

        $employeePhotos = [];
        foreach ($this->input('employee_photos') as $employeePhoto) {
            if ( ! is_null($employeePhoto['image_id'])) {
                $employeePhotos[] = $employeePhoto;
            }
        }
        $this->merge(['employee_photos' => $employeePhotos]);
    }
}
