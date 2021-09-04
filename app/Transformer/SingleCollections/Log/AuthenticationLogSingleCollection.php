<?php

namespace App\Transformer\SingleCollections\Log;

use Bsb\Foundation\Transformer\SingleCollection;

class AuthenticationLogSingleCollection extends SingleCollection
{
    /**
     * @return string
     */
    protected function collects()
    {
        return \App\Transformer\SingleResources\AuthenticationLogResource::class;
    }
}
