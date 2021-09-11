<?php

namespace App\Transformer\SingleResources\Auth;

use Bsb\Foundation\Transformer\SingleResource;

class WidgetSingleResource extends SingleResource
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'ref' => $this->ref,
            'package_id' => $this->package_id,
        ];
    }
}
