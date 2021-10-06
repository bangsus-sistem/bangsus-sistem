<?php

namespace App\Transformer\RelatedCollections\Master;

use Bsb\Foundation\Transformer\RelatedCollection;

class QualityControlParameterRelatedCollection extends RelatedCollection
{
    /**
     * @return string
     */
    protected function collects()
    {
        return \App\Transformer\RelatedResources\Master\QualityControlParameterRelatedResource::class;
    }
}
