<?php

namespace App\Http\Controllers\Ajax\Hrm;

use Bsb\Foundation\Http\Controller;
use App\Models\Hrm\AttendanceType;
use Illuminate\Http\Request;
use App\Transformer\SingleCollections\Hrm\AttendanceTypeSingleCollection;

class AttendanceTypeController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function manifest()
    {
        return response()->json(new AttendanceTypeSingleCollection(AttendanceType::all()), 200);
    }
}
