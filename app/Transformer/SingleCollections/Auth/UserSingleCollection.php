<?php

namespace App\Transformer\SingleCollections\Auth;

use Bsb\Foundation\Transformer\SingleCollection;

class UserSingleCollection extends SingleCollection
{
    /**
     * @return string
     */
    protected function collects()
    {
        return \App\Transformer\SingleResources\Auth\UserSingleResource::class;
    }
}
