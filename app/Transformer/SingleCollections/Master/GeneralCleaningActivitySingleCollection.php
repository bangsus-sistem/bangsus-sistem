<?php

namespace App\Transformer\SingleCollections\Master;

use Bsb\Foundation\Transformer\SingleCollection;

class GeneralCleaningActivitySingleCollection extends SingleCollection
{
    /**
     * @return string
     */
    protected function collects()
    {
        return \App\Transformer\SingleResources\Master\GeneralCleaningActivitySingleResource::class;
    }
}
