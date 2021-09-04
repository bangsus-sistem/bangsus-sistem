<?php

namespace App\Transformer\PaginatedCollections\Log;

use Bsb\Foundation\Transformer\PaginatedCollection;

class ActivityLogPaginatedCollection extends PaginatedCollection
{
    /**
     * @return string
     */
    protected function collects()
    {
        return \App\Transformer\PaginatedResources\Log\ActivityLogPaginatedResource::class;
    }
}
