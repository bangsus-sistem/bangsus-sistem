<?php

namespace App\Transformer\PaginatedCollections\Master;

use Bsb\Foundation\Transformer\PaginatedCollection;

class MarketingActivityPaginatedCollection extends PaginatedCollection
{
    /**
     * @return string
     */
    protected function collects()
    {
        return \App\Transformer\PaginatedResources\Master\MarketingActivityPaginatedResource::class;
    }
}
