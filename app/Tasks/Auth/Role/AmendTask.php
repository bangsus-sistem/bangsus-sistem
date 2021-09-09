<?php

namespace App\Tasks\Ajax\Auth\Role;

use Bsb\Foundation\Task;

class AmendTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle($request)
    {
        $role = Role::findOrFail($request->input('id'));
        $this->transaction(
            function () use ($request, $role) {
                $role->name = $request->input('name');
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
