<?php

namespace App\Http\Controllers\TeacherDash\Ddashboard;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Quizz;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    // public function index(){
    //     // $quizz=Quizz::get();
        
    //     $questions = Quizz::where('teacher_id', auth()->user()->id)->get();
    //     return view('Teachers.dashboard.Questions.index',compact('questions'));
    // }


    public function store(Request $request)
    {
        try {
            $question = new Question();
            $question->title = $request->title;
            $question->answers = $request->answers;
            $question->right_answer = $request->right_answer;
            $question->score = $request->score;
            $question->quizze_id = $request->quizz_id;
            $question->save();
            toastr()->success(trans('messages.success'));
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }


    public function show($id)
    {
        $quizz_id = $id;
        return view('Teachers.dashboard.Questions.create', compact('quizz_id'));
    }


    public function edit($id)
    {
        $question = Question::findorFail($id);
        return view('Teachers.dashboard.Questions.edit', compact('question'));
    }


    public function update(Request $request, $id)
    {
        try {
            $question = Question::findorfail($id);
            $question->title = $request->title;
            $question->answers = $request->answers;
            $question->right_answer = $request->right_answer;
            $question->score = $request->score;
            $question->save();
            toastr()->success(trans('messages.Update'));
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }


    public function destroy($id)
    {
        try {
            Question::destroy($id);
            toastr()->error(trans('messages.Delete'));
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
