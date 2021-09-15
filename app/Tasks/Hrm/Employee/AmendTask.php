<?php

namespace App\Tasks\Hrm\Employee;

use Bsb\Foundation\Task;
use App\Models\Hrm\{
    Employee,
    EmployeeAddress,
    EmployeeContact,
    EmployeePhoto,
};

class AmendTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle($request)
    {
        $employee = Employee::findOrFail($request->input('id'));
        $this->transaction(
            function () use ($request, $employee) {
                $employee->nik = $request->input('nik');
                $employee->full_name = $request->input('full_name');
                $employee->birth_place = $request->input('birth_place');
                $employee->birth_date = $request->input('birth_date');
                $employee->blood_type_id = $request->input('blood_type_id');
                $employee->gender_id = $request->input('gender_id');
                if ($employee->hasntBeenAdmitted()) {
                    $employee->first_branch_id = $request->input('first_branch_id');
                    $employee->first_job_title_id = $request->input('first_job_title_id');
                }
                $employee->start_date = $request->input('start_date');
                $employee->description = $request->input('description');
                $employee->note = $request->input('note');
                $employee->save();

                $this->normalizeEmployeeAddresses($employee,
                    collect($request->input('employee_addresses'))
                        ->map(fn ($employeeAddress, $key) => $employeeAddress['address_type_id'])
                        ->all()
                );
                foreach ($request->input('employee_addresses') as $employeeAddressInput) {
                    $employeeAddressInput = (object) $employeeAddressInput;
                    $employeeAddress = is_null($employeeAddressInput->id ?? null)
                        ?   new EmployeeAddress
                        :   EmployeeAddress::findOrFail(
                                $employeeAddressInput->id
                            );
                    $employeeAddress->employee_id = $employee->id;
                    $employeeAddress->address_type_id = $employeeAddressInput->address_type_id;
                    $employeeAddress->address = $employeeAddressInput->address;
                    $employeeAddress->description = '';
                    $employeeAddress->note = '';
                    $employeeAddress->save();
                }

                $this->normalizeEmployeeContacts($employee,
                    collect($request->input('employee_contacts'))
                        ->map(fn ($employeeContact, $key) => $employeeContact['contact_type_id'])
                        ->all()
                );
                foreach ($request->input('employee_contacts') as $employeeContactInput) {
                    $employeeContactInput = (object) $employeeContactInput;
                    $employeeContact = is_null($employeeContactInput->id ?? null)
                        ?   new EmployeeContact
                        :   EmployeeContact::findOrFail(
                                $employeeContactInput->id
                            );
                    $employeeContact->employee_id = $employee->id;
                    $employeeContact->contact_type_id = $employeeContactInput->contact_type_id;
                    $employeeContact->contact = $employeeContactInput->contact;
                    $employeeContact->description = '';
                    $employeeContact->note = '';
                    $employeeContact->save();
                }

                $this->normalizeEmployeePhotos($employee,
                    collect($request->input('employee_photos'))
                        ->map(fn ($employeePhoto, $key) => $employeePhoto['employee_photo_type_id'])
                        ->all()
                );
                foreach ($request->input('employee_photos') as $employeePhotoInput) {
                    $employeePhotoInput = (object) $employeePhotoInput;
                    $employeePhoto = is_null($employeePhotoInput->id ?? null)
                        ?   new EmployeePhoto
                        :   EmployeePhoto::findOrFail(
                                $employeePhotoInput->id
                            );
                    $employeePhoto->employee_id = $employee->id;
                    $employeePhoto->employee_photo_type_id = $employeePhotoInput->employee_photo_type_id;
                    $employeePhoto->image_id = $employeePhotoInput->image_id;
                    $employeePhoto->description = '';
                    $employeePhoto->note = '';
                    $employeePhoto->save();
                }
            }
        );

        return $employee;
    }

    /**
     * @param  \Illuminate\Database\Eloquent\Model  $employee
     * @param  array  $addressTypeIds
     * @return void
     */
    private function normalizeEmployeeAddresses($employee, $addressTypeIds)
    {
        $employee->employeeAddresses()
            ->whereNotIn('address_type_id', $addressTypeIds)
            ->get()
            ->each(fn ($employeeAddress) => $employeeAddress->delete());

        $employee->employeeAddresses()
            ->withTrashed()
            ->whereIn('address_type_id', $addressTypeIds)
            ->get()
            ->each(
                fn ($employeeAddress) =>
                    $employeeAddress->trashed()
                        ?   $employeeAddress->restore()
                        :   null
            );
    }

    /**
     * @param  \Illuminate\Database\Eloquent\Model  $employee
     * @param  array  $contactTypeIds
     * @return void
     */
    private function normalizeEmployeeContacts($employee, $contactTypeIds)
    {
        $employee->employeeContacts()
            ->whereNotIn('contact_type_id', $contactTypeIds)
            ->get()
            ->each(fn ($employeeContact) => $employeeContact->delete());

        $employee->employeeContacts()
            ->withTrashed()
            ->whereIn('contact_type_id', $contactTypeIds)
            ->get()
            ->each(
                fn ($employeeContact) =>
                    $employeeContact->trashed()
                        ?   $employeeContact->restore()
                        :   null
            );
    }

    /**
     * @param  \Illuminate\Database\Eloquent\Model  $employee
     * @param  array  $employeePhotoTypeIds
     * @return void
     */
    private function normalizeEmployeePhotos($employee, $employeePhotoTypeIds)
    {
        $employee->employeePhotos()
            ->whereNotIn('employee_photo_type_id', $employeePhotoTypeIds)
            ->get()
            ->each(fn ($employeePhoto) => $employeePhoto->delete());

        $employee->employeePhotos()
            ->withTrashed()
            ->whereIn('employee_photo_type_id', $employeePhotoTypeIds)
            ->get()
            ->each(
                fn ($employeePhoto) =>
                    $employeePhoto->trashed()
                        ?   $employeePhoto->restore()
                        :   null
            );
    }
}
