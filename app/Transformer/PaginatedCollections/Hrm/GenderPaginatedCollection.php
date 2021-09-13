<?php

namespace App\Transformer\PaginatedCollections\Hrm;

use Bsb\Foundation\Transformer\PaginatedCollection;

class GenderPaginatedCollection extends PaginatedCollection
{
    /**
     * @return string
     */
    protected function collects()
    {
        return \App\Transformer\PaginatedResources\GenderPaginatedResource::class;
    }
}
