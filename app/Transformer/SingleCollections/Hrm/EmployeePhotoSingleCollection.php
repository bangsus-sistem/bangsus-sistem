<?php

namespace App\Transformer\SingleCollections\Hrm;

use Bsb\Foundation\Transformer\SingleCollection;

class EmployeePhotoSingleCollection extends SingleCollection
{
    /**
     * @return string
     */
    protected function collects()
    {
        return \App\Transformer\SingleResources\Hrm\EmployeePhotoSingleResource::class;
    }
}