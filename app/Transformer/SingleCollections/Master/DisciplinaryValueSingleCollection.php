<?php

namespace App\Transformer\SingleCollections\Master;

use Bsb\Foundation\Transformer\SingleCollection;

class DisciplinaryValueSingleCollection extends SingleCollection
{
    /**
     * @return string
     */
    protected function collects()
    {
        return \App\Transformer\SingleResources\Master\DisciplinaryValueSingleResource::class;
    }
}
