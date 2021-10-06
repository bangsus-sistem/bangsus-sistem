<?php

namespace App\Transformer\PaginatedResources\Master;

use Bsb\Foundation\Transformer\PaginatedResource;

class ProductionTypePaginatedResource extends PaginatedResource
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'code' => $this->code,
            'name' => $this->name,
            'active' => (bool) $this->active,
        ];
    }
}
