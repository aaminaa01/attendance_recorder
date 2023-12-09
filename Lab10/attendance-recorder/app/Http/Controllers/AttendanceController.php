<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttendanceController extends Controller
{
    public function takeAttendance($courseId)
    {
        $students = $this->getStudentsForCourse($courseId);

        if (request()->isMethod('post')) {
            foreach (request('attendance', []) as $studentId => $isPresent) {
                $this->markAttendance($courseId, $studentId, $isPresent);
            }

            return "Attendance marked successfully!";
        }

        return view('attendance.take', compact('students'));
    }

    private function getStudentsForCourse($courseId)
    {
        return DB::table('user')
            ->select('id', 'fullname')
            ->whereIn('id', function ($query) use ($courseId) {
                $query->select('student_id')
                    ->from('enrollments')
                    ->where('course_id', $courseId);
            })
            ->get();
    }

    private function markAttendance($courseId, $studentId, $isPresent)
    {
        DB::table('attendance')->insert([
            'classid' => $courseId,
            'studentid' => $studentId,
            'isPresent' => ($isPresent == 'present') ? 1 : 0,
            'date' => now(),
        ]);
    }
}
