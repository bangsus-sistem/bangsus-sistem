<?php

namespace App\Transformer\PaginatedCollections\Penalty;

use Bsb\Foundation\Transformer\PaginatedCollection;

class CommonPenaltyPaginatedCollection extends PaginatedCollection
{
    /**
     * @return string
     */
    protected function collects()
    {
        return \App\Transformer\PaginatedResources\Penalty\CommonPenaltyPaginatedResource::class;
    }
}
