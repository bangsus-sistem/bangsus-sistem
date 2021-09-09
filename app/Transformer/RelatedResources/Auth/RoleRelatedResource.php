<?php

namespace App\Transformer\RelatedResources\Auth;

use Bsb\Foundation\Transformer\RelatedResource;
use App\Transformer\SingleCollections\Auth\{
    FeatureSingleCollection,
    WidgetSingleCollection,
    ReportSingleCollection,
};
use App\Transformer\SingleResources\Auth\UserSingleResource;

class RoleRelatedResource extends RelatedResource
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
            'all_features' => (bool) $this->all_features,
            'all_widgets' => (bool) $this->all_widgets,
            'all_reports' => (bool) $this->all_reports,
            'features' => new FeatureRelatedCollection($this->features),
            'widgets' => new WidgetSingleCollection($this->widgets),
            'reports' => new ReportSingleCollection($this->reports),
            'description' => $this->description,
            'note' => $this->note,
            'user_create' => new UserSingleResource($this->userCreate),
            'user_update' => new UserSingleResource($this->userUpdate),
            'user_delete' => new UserSingleResource($this->userDelete),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ];
    }
}
