<?php

namespace App\Transformer\PaginatedCollections\Log;

use Bsb\Foundation\Transformer\PaginatedCollection;

class AuthenticationLogPaginatedCollection extends PaginatedCollection
{
    /**
     * @return string
     */
    protected function collects()
    {
        return \App\Transformer\PaginatedResources\Log\AuthenticationLogPaginatedResource::class;
    }
}
