<?php

namespace App\Transformer\PaginatedCollections\Hrm;

use Bsb\Foundation\Transformer\PaginatedCollection;

class AttendanceTypePaginatedCollection extends PaginatedCollection
{
    /**
     * @return string
     */
    protected function collects()
    {
        return \App\Transformer\PaginatedResources\Hrm\AttendanceTypePaginatedResource::class;
    }
}
