<?php

namespace App\Transformer\SingleCollections\Auth;

use Bsb\Foundation\Transformer\SingleCollection;

class WidgetSingleCollection extends SingleCollection
{
    /**
     * @return string
     */
    protected function collects()
    {
        return \App\Transformer\SingleResources\Auth\WidgetSingleResource::class;
    }
}
