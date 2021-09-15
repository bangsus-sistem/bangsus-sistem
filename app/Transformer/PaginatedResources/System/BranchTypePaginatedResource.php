<?php

namespace App\Transformer\PaginatedResources\System;

use Bsb\Foundation\Transformer\PaginatedResource;

class BranchTypePaginatedResource extends PaginatedResource
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
            'locked' => (bool) $this->locked,
            'hidden' => (bool) $this->hidden,
        ];
    }
}
