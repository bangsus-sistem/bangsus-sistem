<?php

namespace App\Transformer\SingleResources\Storage;

use Bsb\Foundation\Transformer\SingleResource;

class FileSingleResource extends SingleResource
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'storage_dir' => $this->storage_dir,
            'link' => route('storage.file', ['id' => $this->id]),
            'user_create_id' => $this->user_create_id,
            'user_update_id' => $this->user_update_id,
            'user_delete_id' => $this->user_delete_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ];
    }
}
