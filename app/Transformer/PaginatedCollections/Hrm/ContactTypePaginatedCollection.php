<?php

namespace App\Transformer\PaginatedCollections\Hrm;

use Bsb\Foundation\Transformer\PaginatedCollection;

class ContactTypePaginatedCollection extends PaginatedCollection
{
    /**
     * @return string
     */
    protected function collects()
    {
        return \App\Transformer\PaginatedResources\Hrm\ContactTypePaginatedResource::class;
    }
}
