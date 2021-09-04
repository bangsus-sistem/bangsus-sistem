<?php

namespace App\Transformer\PaginatedResources\Log;

use Bsb\Foundation\Transformer\PaginatedResource;
use App\Transformer\SingleResources\Auth\UserSingleResource;

class AuthenticationLogPaginatedResource extends PaginatedResource
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user' => new UserSingleResource($this->user),
            'state' => (bool) $this->state,
            'created_at' => $this->created_at,
        ];
    }
}
