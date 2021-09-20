<?php

namespace App\Validation\Hrm\Attendance;

use Bsb\Foundation\Validation\RequestRule;
use Illuminate\Contracts\Validation\Rule;
use App\Models\System\Branch;
use Haversini\Haversini;

class ValidPositionRule extends RequestRule implements Rule
{
    /**
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $branch = Branch::findOrFail($this->request->input('branch_id'));
        $position = $branch::pointToArray($branch->position);

        $distance = Haversini::calculate(
            $position['latitude'],
            $position['longitude'],
            $value['latitude'],
            $value['longitude'],
            'm'
        );

        $this->setMessage('Anda tidak sedang berada di Cabang');

        return $distance < 50;
    }
}
