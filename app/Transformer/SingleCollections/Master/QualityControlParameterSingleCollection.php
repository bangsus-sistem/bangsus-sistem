<?php

namespace App\Transformer\SingleCollections\Master;

use Bsb\Foundation\Transformer\SingleCollection;

class QualityControlParameterSingleCollection extends SingleCollection
{
    /**
     * @return string
     */
    protected function collects()
    {
        return \App\Transformer\SingleResources\Master\QualityControlParameterSingleResource::class;
    }
}
