<?php

namespace App\Repository;

use App\Models\Attendace;
use App\Models\Grade;
use App\Models\students;
use App\Models\Teacher;

class AttendaceRepository implements AttendaceRepositoryInterface
{

    public function index()
    {
        $students = students::all();
        return view('Attendance.index', compact('students'));
    }


    // public function index()
    // {
    //     $Grades = Grade::with(['section'])->get();
    //     $list_Grades = Grade::all();
    //     $teachers = Teacher::all();
    //     return view('Attendance.Sections', compact('Grades', 'list_Grades', 'teachers'));
    // }

    public function show($id)
    {
        $students = students::with('attendance')->where('section_id', $id)->get();
        return view('Attendance.index', compact('students'));
    }

    public function store($request)
    {
        try {

            foreach ($request->attendences as $studentid => $attendence) {

                if ($attendence == 'presence') {
                    $attendence_status = true;
                } else if ($attendence == 'absent') {
                    $attendence_status = false;
                }

                Attendace::create([
                    'student_id' => $studentid,
                    'grade_id' => $request->grade_id,
                    'classroom_id' => $request->classroom_id,
                    'section_id' => $request->section_id,
                    'teacher_id' => 1,
                    'attendence_date' => date('Y-m-d'),
                    'attendence_status' => $attendence_status
                ]);
            }

            toastr()->success(trans('messages.success'));
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update($request)
    {
        // TODO: Implement update() method.
    }

    public function destroy($request)
    {
        // TODO: Implement destroy() method.
    }
}
