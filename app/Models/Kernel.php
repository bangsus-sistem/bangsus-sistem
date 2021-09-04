<?php

namespace App\Models;

class Kernel
{
    /**
     * @var array
     */
    public static $relationMorphAliasses = [
        'feature' => \App\Models\Auth\Feature::class,
        'widget' => \App\Models\Auth\Widget::class,
        'report' => \App\Models\Auth\Report::class,
    ];
}
