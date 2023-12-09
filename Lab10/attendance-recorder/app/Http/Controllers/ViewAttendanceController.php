<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ViewAttendanceController extends Controller
{
    public function viewAttendance($courseId)
    {
        $datesOfClasses = $this->getDatesOfConductedClasses($courseId);

        return view('attendance.view', compact('courseId', 'datesOfClasses'));
    }

    private function getDatesOfConductedClasses($courseId)
    {
        return DB::table('attendance')
            ->select(DB::raw('DISTINCT DATE(date) as classdate'))
            ->where('classid', $courseId)
            ->orderBy('date')
            ->get()
            ->pluck('classdate')
            ->toArray();
    }
}
