<?php

namespace App\Transformer\SingleResources\Auth;

use Bsb\Foundation\Transformer\SingleResource;

class FeatureSingleResource extends SingleResource
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'module_id' => $this->module_id,
            'action_id' => $this->action_id,
        ];
    }
}
