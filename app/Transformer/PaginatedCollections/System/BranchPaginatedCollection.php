<?php

namespace App\Transformer\PaginatedCollections\System;

use Bsb\Foundation\Transformer\PaginatedCollection;

class BranchPaginatedCollection extends PaginatedCollection
{
    /**
     * @return string
     */
    protected function collects()
    {
        return \App\Transformer\PaginatedResources\System\BranchPaginatedResource::class;
    }
}
