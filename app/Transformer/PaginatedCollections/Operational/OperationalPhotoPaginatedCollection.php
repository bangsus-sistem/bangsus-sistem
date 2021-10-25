<?php

namespace App\Transformer\PaginatedCollections\Operational;

use Bsb\Foundation\Transformer\PaginatedCollection;

class OperationalPhotoPaginatedCollection extends PaginatedCollection
{
    /**
     * @return string
     */
    protected function collects()
    {
        return \App\Transformer\PaginatedResources\Operational\OperationalPhotoPaginatedResource::class;
    }
}
