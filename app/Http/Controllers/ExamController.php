<?php
namespace App\Http\Controllers;

use App\Models\Quizz;
use App\Models\Question;
use App\Models\Degree;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExamController extends Controller
{
   
    // عرض الامتحانات المتاحة
    public function index()
    {
        $quizzes = Quizz::all();
        return view('Students.dashboard.exams.index', compact('quizzes'));
    }


    // بدء الامتحان
    public function startExam($quizId)
    {
        $firstQuestion = Question::where('quizze_id', $quizId)->first();
        return redirect()->route('exam.show', $firstQuestion->id);
    }

    // عرض السؤال
    public function showQuestion($questionId)
    {
        $question = Question::findOrFail($questionId);
        return view('Students.dashboard.exams.show', compact('question'));
    }

    // إرسال الإجابة
    public function submitAnswer(Request $request)
    {
        $question = Question::find($request->question_id);
        $isCorrect = ($request->selected_answer == $question->right_answer);

        // حفظ إجابة الطالب
        Degree::create([
            'quizze_id' => $question->quizze_id,
            'student_id' => Auth::id(),
            'question_id' => $request->question_id,
            'score' => $isCorrect ? $question->score : 0,
            'date' => now(),
        ]);

        // الانتقال إلى السؤال التالي
        $nextQuestion = Question::where('quizze_id', $question->quizze_id)
            ->where('id', '>', $question->id)
            ->first();

        if ($nextQuestion) {
            return redirect()->route('exam.show', $nextQuestion->id);
        } else {
            toastr()->success('تم إجراء الاختبار بنجاح');
            return redirect()->route('exam.result');
        }
    }

    // عرض النتيجة
    public function showResult()
    {
        $totalScore = Degree::where('student_id', Auth::id())->sum('score');
        return view('Students.dashboard.exams.result', compact('totalScore'));
    }
}