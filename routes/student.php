<?php

use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\QuizzController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\ExamController;


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
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:student']
    ],
    function () {



        // Route::get('/student/dashboard', function () {
        //     return view('Students.dashboard');
        // });
        Route::get('/student/dashboard', function () {
            return view('Students.dashboard');
        })->name('dashboard.Students');

        Route::group(['namespace' => 'Students\dashboard'], function () {
            
            // عرض الامتحانات المتاحة
Route::get('/exams', [ExamController::class, 'index'])->name('exams');

// بدء الامتحان
Route::get('/exam/start/{quizId}', [ExamController::class, 'startExam'])->name('exam.start');

// عرض السؤال
Route::get('/exam/question/{questionId}', [ExamController::class, 'showQuestion'])->name('exam.show');

// إرسال الإجابة
Route::post('/exam/submit', [ExamController::class, 'submitAnswer'])->name('exam.submit');

// عرض النتيجة
Route::get('/exam/result', [ExamController::class, 'showResult'])->name('exam.result');
        });


       



    }
);
