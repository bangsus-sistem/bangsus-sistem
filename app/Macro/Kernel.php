<?php

namespace App\Macro;

class Kernel
{
    /**
     * @var array
     */
    public static $blueprints = [
        // Booleans
        'active' => Blueprint\Booleans\ActiveBlueprint::class,
        'allBranches' => Blueprint\Booleans\AllBranchesBlueprint::class,
        'allFeatures' => Blueprint\Booleans\AllFeaturesBlueprint::class,
        'allReports' => Blueprint\Booleans\AllReportsBlueprint::class,
        'allWidgets' => Blueprint\Booleans\AllWidgetsBlueprint::class,
        'hidden' => Blueprint\Booleans\HiddenBlueprint::class,
        'locked' => Blueprint\Booleans\LockedBlueprint::class,
        'required' => Blueprint\Booleans\RequiredBlueprint::class,
        'state' => Blueprint\Booleans\StateBlueprint::class,

        // Date
        'birthDate' => Blueprint\Date\BirthDateBlueprint::class,
        'startDate' => Blueprint\Date\StartDateBlueprint::class,

        // Foreign
        'action' => Blueprint\Foreign\ActionBlueprint::class,
        'branch' => Blueprint\Foreign\BranchBlueprint::class,
        'bloodType' => Blueprint\Foreign\BloodTypeBlueprint::class,
        'branchType' => Blueprint\Foreign\BranchTypeBlueprint::class,
        'division' => Blueprint\Foreign\DivisionBlueprint::class,
        'gender' => Blueprint\Foreign\GenderBlueprint::class,
        'jobTitle' => Blueprint\Foreign\JobTitleBlueprint::class,
        'module' => Blueprint\Foreign\ModuleBlueprint::class,
        'package' => Blueprint\Foreign\PackageBlueprint::class,
        'role' => Blueprint\Foreign\RoleBlueprint::class,
        'userAdmit' => Blueprint\Foreign\UserAdmitBlueprint::class,
        'user' => Blueprint\Foreign\UserBlueprint::class,
        'userCreate' => Blueprint\Foreign\UserCreateBlueprint::class,
        'userDelete' => Blueprint\Foreign\UserDeleteBlueprint::class,
        'userTimestamps' => Blueprint\Foreign\UserTimestampsBlueprint::class,
        'userUpdate' => Blueprint\Foreign\UserUpdateBlueprint::class,

        // Strings
        'birthPlace' => Blueprint\Strings\BirthPlaceBlueprint::class,
        'code' => Blueprint\Strings\CodeBlueprint::class,
        'description' => Blueprint\Strings\DescriptionBlueprint::class,
        'fullName' => Blueprint\Strings\FullNameBlueprint::class,
        'name' => Blueprint\Strings\NameBlueprint::class,
        'nik' => Blueprint\Strings\NikBlueprint::class,
        'note' => Blueprint\Strings\NoteBlueprint::class,
        'password' => Blueprint\Strings\PasswordBlueprint::class,
        'ref' => Blueprint\Strings\RefBlueprint::class,
        'username' => Blueprint\Strings\UsernameBlueprint::class,

        // Text
        'storageDir' => Blueprint\Text\StorageDirBlueprint::class,

        // Timestamp
        'admittedAt' => Blueprint\Timestamp\AdmittedAtBlueprint::class,
        'expiredAt' => Blueprint\Timestamp\ExpiredAtBlueprint::class,
    ];

    /**
     * @var array
     */
    public static $rules = [
        // Database
        'exists' => Rule\Database\ExistsRule::class,
    ];
}
