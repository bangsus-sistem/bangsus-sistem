<?php

namespace App\Transformer\PaginatedCollections\Master;

use Bsb\Foundation\Transformer\PaginatedCollection;

class OperationalPhotoTypePaginatedCollection extends PaginatedCollection
{
    /**
     * @return string
     */
    protected function collects()
    {
        return \App\Transformer\PaginatedResources\Master\OperationalPhotoTypePaginatedResource::class;
    }
}
