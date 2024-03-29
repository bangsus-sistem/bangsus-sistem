<?php

namespace App\Tasks\Auth\Role;

use Bsb\Foundation\Task;
use App\Models\Auth\Role;

class StoreTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle($request)
    {
        $role = new Role;
        $this->transaction(
            function () use ($request, $role) {
                $role->code = $request->input('code');
                $role->name = $request->input('name');
                $role->active = true;
                $role->all_features = $request->boolean('all_features');
                $role->all_widgets = $request->boolean('all_widgets');
                $role->all_reports = $request->boolean('all_reports');
                $role->description = $request->input('description');
                $role->note = $request->input('note');
                $role->save();

                if ( ! $role->all_features)
                    $role->features()->sync($request->input('feature_ids'));
                else
                    $role->features()->sync(Feature::all()->pluck('id')->all());

                if ( ! $role->all_widgets)
                    $role->widgets()->sync($request->input('widget_ids'));
                else
                    $role->widgets()->sync(Widget::all()->pluck('id')->all());

                if ( ! $role->all_reports)
                    $role->reports()->sync($request->input('report_ids'));
                else
                    $role->reports()->sync(Report::all()->pluck('id')->all());
            }
        );

        return $role;
    }
}
