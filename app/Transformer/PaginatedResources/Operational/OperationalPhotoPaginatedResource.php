<?php

namespace App\Transformer\PaginatedResources\Operational;

use Bsb\Foundation\Transformer\PaginatedResource;
use App\Transformer\PaginatedResources\System\BranchPaginatedResource;
use App\Transformer\PaginatedResources\Master\OperationalPhotoTypePaginatedResource;
use App\Transformer\SingleResources\Storage\ImageSingleResource;

class OperationalPhotoPaginatedResource extends PaginatedResource
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
            'transaction_datetime' => $this->transaction_datetime,
            'branch' => new BranchPaginatedResource($this->branch),
            'image' => new ImageSingleResource($this->image),
            'operational_photo_type' => new OperationalPhotoTypePaginatedResource($this->operationalPhotoType),
            'total' => (float) $this->total,
        ];
    }
}
