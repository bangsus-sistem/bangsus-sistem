<?php

namespace App\Transformer\SingleCollections\System;

use Bsb\Foundation\Transformer\SingleCollection;

class BranchTypeSingleCollection extends SingleCollection
{
    /**
     * @return string
     */
    protected function collects()
    {
        return \App\Transformer\SingleResources\System\BranchTypeSingleResource::class;
    }
}
