<?php

namespace App\Transformer\SingleResources\Log;

use Bsb\Foundation\Transformer\SingleResource;

class ActivityLogSingleResource extends SingleResource
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'activity_log_type' => $this->activity_log_type,
            'activity_log_id' => $this->activity_log_id,
            'user_delete_id' => $this->user_delete_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ];
    }
}
