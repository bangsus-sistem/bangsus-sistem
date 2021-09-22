<?php

namespace App\Transformer\PaginatedResources\Hrm;

use Bsb\Foundation\Transformer\PaginatedResource;

class JobTitlePaginatedResource extends PaginatedResource
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
            'division' => new DivisionPaginatedResource($this->division),
            'active' => (bool) $this->active,
            'required' => (bool) $this->required,
        ];
    }
}
