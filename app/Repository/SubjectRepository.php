<?php

namespace App\Repository;

use App\Models\Grade;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Database\Console\Migrations\RollbackCommand;
use Monolog\Handler\RollbarHandler;

class SubjectRepository implements SubjectRepositoryInterface
{

    public function index()
    {
        $subjects = Subject::all();
        return view('Subjects.index', compact('subjects'));
    }

    public function create()
    {
        $grades = Grade::all();
        $teachers = Teacher::all();

        return view('Subjects.create', compact('grades', 'teachers'));
    }

    public function edit($id)
    {
        $subject = Subject::findorfail($id);
        $grades = Grade::all();
        $teachers = Teacher::all();


        return view('Subjects.edit', compact('subject', 'grades', 'teachers'));
    }


    public function store($request)
    {
        try {
            $subjects = new Subject();
            $subjects->name = ['ar' => $request->Name_ar, 'en' => $request->Name_en];
            $subjects->grade_id = $request->Grade_id;
            $subjects->classroom_id = $request->Class_id;
            $subjects->teachers_id    = $request->teacher_id;
            $subjects->save();
            toastr()->success(trans('messages.success'));
            return redirect('subjects_create');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }


    public function update($request)
    {
        try {

            $subjects = Subject::findorfail($request->id);
            $subjects->name = ['ar' => $request->Name_ar, 'en' => $request->Name_en];
            $subjects->grade_id = $request->Grade_id;
            $subjects->classroom_id = $request->Class_id;
            $subjects->teachers_id    = $request->teacher_id;
            $subjects->save();
            toastr()->success(trans('messages.Update'));
            return redirect()->route('subjects.create');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        Subject::findorfail($request->id)->delete();
        return redirect('subjects_index');
    }
}
