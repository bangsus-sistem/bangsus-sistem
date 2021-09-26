<?php

use Illuminate\Support\Facades\Route;

Route::prefix('contact_type')->group(function () {
    Route::get('all', 'ContactTypeController@manifest');
    Route::get('', 'ContactTypeController@index');
    Route::get('{id}', 'ContactTypeController@show');
    Route::post('', 'ContactTypeController@store');
    Route::put('', 'ContactTypeController@amend');
    Route::patch('activate', 'ContactTypeController@reviseActivate');
    Route::patch('deactivate', 'ContactTypeController@reviseDeactivate');
    Route::delete('', 'ContactTypeController@destroy');
});

Route::prefix('address_type')->group(function () {
    Route::get('all', 'AddressTypeController@manifest');
    Route::get('', 'AddressTypeController@index');
    Route::get('{id}', 'AddressTypeController@show');
    Route::post('', 'AddressTypeController@store');
    Route::put('', 'AddressTypeController@amend');
    Route::patch('activate', 'AddressTypeController@reviseActivate');
    Route::patch('deactivate', 'AddressTypeController@reviseDeactivate');
    Route::delete('', 'AddressTypeController@destroy');
});

Route::prefix('employee_photo_type')->group(function () {
    Route::get('all', 'EmployeePhotoTypeController@manifest');
    Route::get('', 'EmployeePhotoTypeController@index');
    Route::get('{id}', 'EmployeePhotoTypeController@show');
    Route::post('', 'EmployeePhotoTypeController@store');
    Route::put('', 'EmployeePhotoTypeController@amend');
    Route::patch('activate', 'EmployeePhotoTypeController@reviseActivate');
    Route::patch('deactivate', 'EmployeePhotoTypeController@reviseDeactivate');
    Route::delete('', 'EmployeePhotoTypeController@destroy');
});

Route::prefix('division')->group(function () {
    Route::get('all', 'DivisionController@manifest');
    Route::get('', 'DivisionController@index');
    Route::get('{id}', 'DivisionController@show');
    Route::post('', 'DivisionController@store');
    Route::put('', 'DivisionController@amend');
    Route::patch('activate', 'DivisionController@reviseActivate');
    Route::patch('deactivate', 'DivisionController@reviseDeactivate');
    Route::delete('', 'DivisionController@destroy');
});

Route::prefix('job_title')->group(function () {
    Route::get('all', 'JobTitleController@manifest');
    Route::get('', 'JobTitleController@index');
    Route::get('{id}', 'JobTitleController@show');
    Route::post('', 'JobTitleController@store');
    Route::put('', 'JobTitleController@amend');
    Route::patch('activate', 'JobTitleController@reviseActivate');
    Route::patch('deactivate', 'JobTitleController@reviseDeactivate');
    Route::delete('', 'JobTitleController@destroy');
});

Route::prefix('gender')->group(function () {
    Route::get('all', 'GenderController@manifest');
    Route::get('', 'GenderController@index');
    Route::get('{id}', 'GenderController@show');
    Route::post('', 'GenderController@store');
    Route::put('', 'GenderController@amend');
    Route::patch('activate', 'GenderController@reviseActivate');
    Route::patch('deactivate', 'GenderController@reviseDeactivate');
    Route::delete('', 'GenderController@destroy');
});

Route::prefix('blood_type')->group(function () {
    Route::get('all', 'BloodTypeController@manifest');
    Route::get('', 'BloodTypeController@index');
    Route::get('{id}', 'BloodTypeController@show');
    Route::post('', 'BloodTypeController@store');
    Route::put('', 'BloodTypeController@amend');
    Route::patch('activate', 'BloodTypeController@reviseActivate');
    Route::patch('deactivate', 'BloodTypeController@reviseDeactivate');
    Route::delete('', 'BloodTypeController@destroy');
});

Route::prefix('employee')->group(function () {
    Route::get('all', 'EmployeeController@manifest');
    Route::get('all_by_branch_assignment', 'EmployeeController@manifestByBranchAssignment');
    Route::get('', 'EmployeeController@index');
    Route::get('{id}', 'EmployeeController@show');
    Route::post('', 'EmployeeController@store');
    Route::put('', 'EmployeeController@amend');
    Route::patch('admit', 'EmployeeController@reviseAdmit');
    Route::delete('', 'EmployeeController@destroy');
});

Route::prefix('employee_assignment')->group(function () {
    Route::get('all', 'EmployeeAssignmentController@manifest');
    Route::get('', 'EmployeeAssignmentController@index');
    Route::get('{id}', 'EmployeeAssignmentController@show');
    Route::post('', 'EmployeeAssignmentController@store');
    Route::put('', 'EmployeeAssignmentController@amend');
    Route::patch('admit', 'EmployeeAssignmentController@reviseAdmit');
    Route::delete('', 'EmployeeAssignmentController@destroy');
});

Route::prefix('employee_mutation')->group(function () {
    Route::get('all', 'EmployeeMutationController@manifest');
    Route::get('', 'EmployeeMutationController@index');
    Route::get('{id}', 'EmployeeMutationController@show');
    Route::post('', 'EmployeeMutationController@store');
    Route::put('', 'EmployeeMutationController@amend');
    Route::patch('admit', 'EmployeeMutationController@reviseAdmit');
    Route::delete('', 'EmployeeMutationController@destroy');
});

Route::prefix('attendance_type')->group(function () {
    Route::get('all', 'AttendanceTypeController@manifest');
});

Route::prefix('attendance')->group(function () {
    Route::get('all', 'AttendanceController@manifest');
    Route::get('', 'AttendanceController@index');
    Route::get('{id}', 'AttendanceController@show');
    Route::post('', 'AttendanceController@store');
    Route::post('attendance', 'AttendanceController@storeAttendance');
    Route::put('', 'AttendanceController@amend');
    Route::delete('', 'AttendanceController@destroy');
});

Route::prefix('schedule_submission')->group(function () {
    Route::get('all', 'ScheduleSubmissionController@manifest');
    Route::get('', 'ScheduleSubmissionController@index');
    Route::get('{id}', 'ScheduleSubmissionController@show');
    Route::post('', 'ScheduleSubmissionController@store');
    Route::post('monthly', 'ScheduleSubmissionController@storeMonthly');
    Route::put('', 'ScheduleSubmissionController@amend');
    Route::patch('admit', 'ScheduleSubmissionController@reviseAdmit');
    Route::patch('admit_monthly', 'ScheduleSubmissionController@reviseAdmitMonthly');
    Route::delete('', 'ScheduleSubmissionController@destroy');
});
