<?php

namespace App\Repository;

use App\Models\Grade;
use App\Models\students;
use Flasher\Laravel\Http\Request;

class StudentGraduatedRepository implements StudentGraduatedRepositoryInterface
{
    public function index()
    {
        $students = Students::onlyTrashed()->get();
        return view('Students.Graduated.index', compact('students'));
    }

    public function create()
    {
        $Grades = Grade::all();
        return view('Students.Graduated.create', compact('Grades'));
    }

    public function SoftDelete($request)
    {
        $students = students::where('Grade_id', $request->Grade_id)->where('Classroom_id', $request->Classroom_id)->where('section_id', $request->section_id)->get();

        if ($students->count() < 1) {
            return redirect()->back()->with('error_Graduated', __('لاتوجد بيانات في جدول الطلاب'));
        }

        foreach ($students as $student) {
            $ids = explode(',', $student->id);
            students::whereIn('id', $ids)->Delete();
        }

        toastr()->success(trans('messages.success'));
        return redirect()->route('Graduated_index');
    }

    public function ReturnData($request)
    {
        students::onlyTrashed()->where('id', $request->id)->first()->restore();
        toastr()->success(trans('messages.success'));
        return redirect()->back();
    }

    public function destroy($request)
    {
        students::onlyTrashed()->where('id', $request->id)->first()->forceDelete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->back();
    }

}
