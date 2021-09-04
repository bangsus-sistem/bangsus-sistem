<?php

namespace App\Macro;

class Kernel
{
    /**
     * @var array
     */
    public static $blueprints = [
        // Booleans.
        'active' => Blueprint\Booleans\ActiveBlueprint::class,
        'allBranches' => Blueprint\Booleans\AllBranchesBlueprint::class,
        'allFeatures' => Blueprint\Booleans\AllFeaturesBlueprint::class,
        'allReports' => Blueprint\Booleans\AllReportsBlueprint::class,
        'allWidgets' => Blueprint\Booleans\AllWidgetsBlueprint::class,
        'hidden' => Blueprint\Booleans\HiddenBlueprint::class,
        'locked' => Blueprint\Booleans\LockedBlueprint::class,
        'state' => Blueprint\Booleans\StateBlueprint::class,

        // Foreign.
        'action' => Blueprint\Foreign\ActionBlueprint::class,
        'branch' => Blueprint\Foreign\BranchBlueprint::class,
        'branchType' => Blueprint\Foreign\BranchTypeBlueprint::class,
        'module' => Blueprint\Foreign\ModuleBlueprint::class,
        'package' => Blueprint\Foreign\PackageBlueprint::class,
        'role' => Blueprint\Foreign\RoleBlueprint::class,
        'user' => Blueprint\Foreign\UserBlueprint::class,
        'userCreate' => Blueprint\Foreign\UserCreateBlueprint::class,
        'userDelete' => Blueprint\Foreign\UserDeleteBlueprint::class,
        'userTimestamps' => Blueprint\Foreign\UserTimestampsBlueprint::class,
        'userUpdate' => Blueprint\Foreign\UserUpdateBlueprint::class,

        // Strings.
        'code' => Blueprint\Strings\CodeBlueprint::class,
        'description' => Blueprint\Strings\DescriptionBlueprint::class,
        'fullName' => Blueprint\Strings\FullNameBlueprint::class,
        'name' => Blueprint\Strings\NameBlueprint::class,
        'note' => Blueprint\Strings\NoteBlueprint::class,
        'password' => Blueprint\Strings\PasswordBlueprint::class,
        'ref' => Blueprint\Strings\RefBlueprint::class,
        'username' => Blueprint\Strings\UsernameBlueprint::class,

        // Timestamp.
        'expiredAt' => Blueprint\Timestamp\ExpiredAtBlueprint::class,
    ];

    /**
     * @var array
     */
    public static $rules = [

    ];
}
