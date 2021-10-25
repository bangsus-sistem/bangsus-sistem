<?php

namespace App\Transformer\PaginatedCollections\Penalty;

use Bsb\Foundation\Transformer\PaginatedCollection;

class MaterialPenaltyPaginatedCollection extends PaginatedCollection
{
    /**
     * @return string
     */
    protected function collects()
    {
        return \App\Transformer\PaginatedResources\Penalty\MaterialPenaltyPaginatedResource::class;
    }
}
