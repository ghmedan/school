<?php

use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Teacher;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SectionsController;
use App\Http\Controllers\TeacherDash\Ddashboard\QuizzController;

use App\Http\Controllers\TeacherDash\Ddashboard\StudentsController;
// use MacsiDigital\OAuth2\Support\Token\DB;
use Illuminate\Support\Facades\DB;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/




Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(), // قروب اللغات وكذالك تستخدم هذه الداله في بقاء المتصفح على نفس اللغة التي تم الخروج من المتصفح ومن ثم العوده اليه وهو بنفس اللغه ا
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:teacher']
    ],
    function () {



        Route::get('/teacher/dashboard', function () {

            // $ids = Teacher::findorFail(auth()->user()->id)->section()->pluck('section_id');
            // $data['count_sections'] = $ids->count();
            // $data['count_students'] = \App\Models\Students::whereIn('section_id', $ids)->count();

            $ids = DB::table('teacher_section')->where('teacher_id', auth()->user()->id)->pluck('section_id');
            $count_sections =  $ids->count();
            $count_students = DB::table('students')->whereIn('section_id', $ids)->count();
            return view('Teachers.dashboard.dashboard', compact('count_students', 'count_sections'));
        });

        Route::get('students_index', [App\Http\Controllers\TeacherDash\Ddashboard\StudentsController::class, 'index'])->name('students_index');
        Route::get('sections_index', [App\Http\Controllers\TeacherDash\Ddashboard\StudentsController::class, 'sections'])->name('sections_index');
        Route::post('attendances', [App\Http\Controllers\TeacherDash\Ddashboard\StudentsController::class, 'attendance'])->name('attendances');
        Route::post('attendance_edit', [App\Http\Controllers\TeacherDash\Ddashboard\StudentsController::class, 'editAttendance'])->name('attendance_edit');
        Route::get('attendance_report', [App\Http\Controllers\TeacherDash\Ddashboard\StudentsController::class, 'attendanceReport'])->name('attendance_Report');
        Route::post('attendance_report', [App\Http\Controllers\TeacherDash\Ddashboard\StudentsController::class, 'attendanceSearch'])->name('attendance_Search');
        Route::get('quizze_index', [App\Http\Controllers\TeacherDash\Ddashboard\QuizzController::class, 'index'])->name('quizze_index');
        Route::get('quizzes_create', [App\Http\Controllers\TeacherDash\Ddashboard\QuizzController::class, 'create'])->name('quizzes_create');
        Route::post('quizze_store', [App\Http\Controllers\TeacherDash\Ddashboard\QuizzController::class, 'store'])->name('quizze_store');
        Route::get('quizzes_edit/{id}', [App\Http\Controllers\TeacherDash\Ddashboard\QuizzController::class, 'edit'])->name('quizzes_edit');
        Route::get('quizzes_show/{id}', [App\Http\Controllers\TeacherDash\Ddashboard\QuizzController::class, 'show'])->name('quizzes_show');
        Route::get('student_quizze/{id}', [App\Http\Controllers\TeacherDash\Ddashboard\QuizzController::class, 'show'])->name('student_quizze');
        Route::post('quizzes_update', [App\Http\Controllers\TeacherDash\Ddashboard\QuizzController::class, 'update'])->name('quizzes_update');
        Route::post('quizzes_destroy/{id}', [App\Http\Controllers\TeacherDash\Ddashboard\QuizzController::class, 'destroy'])->name('quizzes_destroy');
        Route::get('questions_show/{id}', [App\Http\Controllers\TeacherDash\Ddashboard\QuestionController::class, 'show'])->name('questions_show');
        Route::post('questions_store', [App\Http\Controllers\TeacherDash\Ddashboard\QuestionController::class, 'store'])->name('questions_store');
        Route::get('questions_edit/{id}', [App\Http\Controllers\TeacherDash\Ddashboard\QuestionController::class, 'edit'])->name('questions_edit');
        Route::post('questions_destroy/{id}', [App\Http\Controllers\TeacherDash\Ddashboard\QuestionController::class, 'destroy'])->name('questions_destroy');
        Route::post('questions_update/{id}', [App\Http\Controllers\TeacherDash\Ddashboard\QuestionController::class, 'update'])->name('questions_update');
        Route::get('questions_index', [App\Http\Controllers\TeacherDash\Ddashboard\QuestionController::class, 'index']);

        // Route::view('Questions_index', 'Teachers.dashboard.Questions.index');
        Route::get('profile_show', [App\Http\Controllers\TeacherDash\Ddashboard\ProfileController::class, 'index'])->name('profile_show');
        Route::post('profile_update/{id}', [App\Http\Controllers\TeacherDash\Ddashboard\ProfileController::class, 'update'])->name('profile_update');
    }
);
