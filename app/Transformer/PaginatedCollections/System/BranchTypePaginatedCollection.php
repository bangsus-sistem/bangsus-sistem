<?php

namespace App\Transformer\PaginatedCollections\System;

use Bsb\Foundation\Transformer\PaginatedCollection;

class BranchTypePaginatedCollection extends PaginatedCollection
{
    /**
     * @return string
     */
    protected function collects()
    {
        return \App\Transformer\PaginatedResources\System\BranchTypePaginatedResource::class;
    }
}
