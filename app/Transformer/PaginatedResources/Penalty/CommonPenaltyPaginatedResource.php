<?php

namespace App\Transformer\PaginatedResources\Penalty;

use Bsb\Foundation\Transformer\PaginatedResource;
use App\Transformer\PaginatedResources\System\BranchPaginatedResource;

class CommonPenaltyPaginatedResource extends PaginatedResource
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
            'total' => (float) $this->total,
        ];
    }
}
