<?php

namespace App\Http\Controllers\TeacherDash\Ddashboard;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Degree;
use App\Models\Grade;
use App\Models\Question;
use App\Models\Quizz;
use App\Models\Sections;
use App\Models\Subject;
use Illuminate\Http\Request;

class QuizzController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quizzes = Quizz::where('teacher_id', auth()->user()->id)->get();
        return view('Teachers.dashboard.Quizzes.index', compact('quizzes'));
    }

    public function create()
    {
        $data['grades'] = Grade::all();
        $data['subjects'] = Subject::where('teachers_id', auth()->user()->id)->get();
        return view('Teachers.dashboard.Quizzes.create', $data);
    }

    public function store(Request $request)
    {
        try {
            $quizzes = new Quizz();
            $quizzes->name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $quizzes->subject_id = $request->subject_id;
            $quizzes->grade_id = $request->Grade_id;
            $quizzes->classroom_id = $request->Classroom_id;
            $quizzes->section_id = $request->section_id;
            $quizzes->teacher_id = auth()->user()->id;
            $quizzes->save();
            toastr()->success(trans('messages.success'));
            return redirect()->route('quizzes.create');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }



    public function edit($id)
    {
        $quizz = Quizz::findorFail($id);
        $data['grades'] = Grade::all();
        $data['subjects'] = Subject::where('teachers_id', auth()->user()->id)->get();
        return view('Teachers.dashboard.Quizzes.edit', $data, compact('quizz'));
    }

    public function show($id)
    {
        $questions = Question::where('quizze_id', $id)->get();
        $quizz = Quizz::findorFail($id);
        return view('Teachers.dashboard.Questions.index', compact('questions', 'quizz'));
    }


    public function update(Request $request)
    {
        try {
            $quizz = Quizz::findorFail($request->id);
            $quizz->name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $quizz->subject_id = $request->subject_id;
            $quizz->grade_id = $request->Grade_id;
            $quizz->classroom_id = $request->Classroom_id;
            $quizz->section_id = $request->section_id;
            $quizz->teacher_id = auth()->user()->id;
            $quizz->save();
            toastr()->success(trans('messages.Update'));
            return redirect()->route('quizze_index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }


    public function destroy($id)
    {
        try {
            Quizz::destroy($id);
            toastr()->error(trans('messages.Delete'));
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function student_quizze($quizze_id)
    {
        $degrees = Degree::where('quizze_id', $quizze_id)->get();
        return view('Teachers.dashboard.Quizzes.student_quizze', compact('degrees'));
    }

    public function repeat_quizze(Request $request)
    {
        Degree::where('student_id', $request->student_id)->where('quizze_id', $request->quizze_id)->delete();
        toastr()->success('تم فتح الاختبار مرة اخرى للطالب');
        return redirect()->back();
    }
}
