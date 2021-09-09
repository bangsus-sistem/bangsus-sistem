<?php

namespace App\Transformer\PaginatedCollections\Auth;

use Bsb\Foundation\Transformer\PaginatedCollection;

class RolePaginatedCollection extends PaginatedCollection
{
    /**
     * @return string
     */
    protected function collects()
    {
        return \App\Transformer\PaginatedResources\Auth\RolePaginatedResource::class;
    }
}
