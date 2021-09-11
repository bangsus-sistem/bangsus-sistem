<?php

namespace App\Transformer\SingleCollections\System;

use Bsb\Foundation\Transformer\SingleCollection;

class BranchSingleCollection extends SingleCollection
{
    /**
     * @return string
     */
    protected function collects()
    {
        return \App\Transformer\SingleResources\System\BranchSingleResource::class;
    }
}
