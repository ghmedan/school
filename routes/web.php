<?php

use App\Http\Controllers\AttendaceController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Classroom\ClassroomController;
use App\Http\Controllers\FeeInvoiceController;
use App\Http\Controllers\FeesController;
use App\Http\Controllers\Grades\GradeController;
use App\Http\Controllers\GraduatedController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentStudentController;
use App\Http\Controllers\ProcessingFeesController;
use App\Livewire\AddParent;

use App\Http\Controllers\SectionsController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentsController;

use App\Http\Controllers\PromotionController;
use App\Http\Controllers\ReceiptStudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\library_controllers;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizzController;
use App\Http\Controllers\OnlineClasseController;
use App\Http\Controllers\SettingController;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Auth::routes();

// Route::get('/add_parent', function () {
//     return view('livewire.show_Form');
// });
Route::view('/add_parent', 'livewire.show_Form')->name('add_parent');


// Route::get('/', function () {
//     return view('auth.login');
// });

Route::get('/', [HomeController::class, 'index'])->name('selection');


Route::group(['namespace' => 'Auth'], function () {
    Route::get('/login/{type}', [LoginController::class, 'loginForm'])->middleware('guest')->name('login.show');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
    Route::get('/logout/{type}', [LoginController::class, 'logout'])->name('logout');
});







Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(), // قروب اللغات وكذالك تستخدم هذه الداله في بقاء المتصفح على نفس اللغة التي تم الخروج من المتصفح ومن ثم العوده اليه وهو بنفس اللغه ا
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
    ],
    function () {



        Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
        Route::get('/dashboard_student', [HomeController::class, 'students'])->name('dashboard_student');








        Route::get('/grades_index', [GradeController::class, 'index'])->name('grade');
        Route::post('/grades_store', [GradeController::class, 'store'])->name('grades');
        Route::post('/grades_update', [GradeController::class, 'update'])->name('grades_up');
        Route::post('/grades_delete', [GradeController::class, 'destroy'])->name('grades_de');



        Route::get('/class_index', [ClassroomController::class, 'index'])->name('class');
        Route::post('/class_store', [ClassroomController::class, 'store'])->name('class_st');
        Route::post('/class_update', [ClassroomController::class, 'update'])->name('class_up');
        Route::post('/class_destroy', [ClassroomController::class, 'destroy'])->name('class_de');
        Route::post('/delete_all', [ClassroomController::class, 'delete_all'])->name('delete_all');
        Route::post('/filter_class', [ClassroomController::class, 'filter_classes'])->name('filter_class');





        Route::get('/section_index', [SectionsController::class, 'index'])->name('section_index');
        Route::post('/section_stor', [SectionsController::class, 'store'])->name('section_st');
        Route::get('/classes/{id}', [SectionsController::class, 'getclasses']);
        Route::post('/section_update', [SectionsController::class, 'update'])->name('section_up');
        Route::post('/section_destroy', [SectionsController::class, 'destroy'])->name('section_de');



        //Route::view('/add_parent', 'livewire.show_Form')->name('add_parent');

        //Route::get('/add_parent', AddParent::class,'render');
        //Route::view('/add_parent', 'livewire.parent_Table')->name('add_parents');
        // Route::view('/addbn', 'empty')->name('add_parent');

        // ==============================Teachers============================
        // Route::group(['namespace' => 'Teachers'], function () {
        //     Route::resource('Teachers', 'TeacherController');
        // });
        Route::get('/Teachers', [TeacherController::class, 'index'])->name('Teachers');
        Route::get('/Teacher', [TeacherController::class, 'create']);
        Route::post('/Teachers_store', [TeacherController::class, 'store']);
        Route::get('/Teachers_edit/{id}', [TeacherController::class, 'edit'])->name('Teachers_edit');
        Route::post('/Teachers_update', [TeacherController::class, 'update'])->name('Teachers_update');
        Route::post('/Teachers_destroy', [TeacherController::class, 'destroy'])->name('Teachers_destroy');















        Route::get('/student_index', [StudentsController::class, 'index'])->name('student_index');
      
        Route::get('/student_add', [StudentsController::class, 'create'])->name('create');

        Route::post('/Students_store', [StudentsController::class, 'store']);
        Route::get('/student_edit/{id}', [StudentsController::class, 'edit']);
        Route::post('/Students_update', [StudentsController::class, 'update']);
        Route::post('/Students_destroy', [StudentsController::class, 'destroy']);
        Route::get('/student_show/{id}', [StudentsController::class, 'show'])->name('student_show');
        Route::post('/Upload_attachment', [StudentsController::class, 'upload']);
        Route::get('/Download_attachment/{name}/{filename}', [StudentsController::class, 'Download_attachment']);
        Route::post('/Delete_attachment', [StudentsController::class, 'Delete_attachment'])->name('Delete_attachment');








        Route::get('/student_promot', [promotionController::class, 'index'])->name('student_promot');
        Route::post('/promotion_store', [promotionController::class, 'store']);
        Route::get('/student_mangmint', [promotionController::class, 'create']);
        Route::post('/Promotion_destroy', [promotionController::class, 'destroy']);







        // Graduated_store 
        Route::get('/Graduated_index', [GraduatedController::class, 'index'])->name('Graduated_index');
        Route::get('/Graduated_creat', [GraduatedController::class, 'create']);
        Route::post('/Graduated_store', [GraduatedController::class, 'store']);
        Route::post('/Graduated_update', [GraduatedController::class, 'update']);
        Route::post('/Graduated_destroy', [GraduatedController::class, 'destroy']);






        // start fees

        Route::get('/fees_index', [FeesController::class, 'index'])->name('fees_index');
        Route::get('/fees_create', [FeesController::class, 'create']);
        Route::post('/fees_store', [FeesController::class, 'store']);
        Route::get('/fees_edit/{id}', [FeesController::class, 'edit']);
        Route::post('/fees_update', [FeesController::class, 'update']);
        Route::post('/fees_destroy', [FeesController::class, 'destroy']);







        // start fees_invoices فاتورة الطالب 


        Route::get('/fees_Invoices_index', [FeeInvoiceController::class, 'index'])->name('fees_Invoices_index');
        Route::get('/fees_Invoices_show/{id}', [FeeInvoiceController::class, 'show']);
        Route::post('/fees_Invoices_store', [FeeInvoiceController::class, 'store']);
        Route::get('/fees_Invoices_edit/{id}', [FeeInvoiceController::class, 'edit']);
        Route::post('/fees_Invoices_update', [FeeInvoiceController::class, 'update']);
        Route::post('/fees_Invoices_destroy', [FeeInvoiceController::class, 'destroy']);







        //start Receipt سندات القبض


        Route::get('/receipt_students_show/{id}', [ReceiptStudentController::class, 'show']);

        Route::get('/receipt_students_index', [ReceiptStudentController::class, 'index'])->name('receipt_students_index');
        Route::post('/receipt_students_store', [ReceiptStudentController::class, 'store']);
        Route::get('/receipt_students_edit/{id}', [ReceiptStudentController::class, 'edit']);
        Route::post('/receipt_students_update', [ReceiptStudentController::class, 'update']);
        Route::post('/receipt_students_destroy', [ReceiptStudentController::class, 'destroy']);


        //start processing  معالجة او استبعاد رسوم


        Route::get('/ProcessingFee_show/{id}', [ProcessingFeesController::class, 'show']);

        Route::get('/ProcessingFee_index', [ProcessingFeesController::class, 'index'])->name('ProcessingFee_index');
        Route::post('/ProcessingFee_store', [ProcessingFeesController::class, 'store']);
        Route::get('/ProcessingFee_edit/{id}', [ProcessingFeesController::class, 'edit']);
        Route::post('/ProcessingFee_update', [ProcessingFeesController::class, 'update']);
        Route::post('/ProcessingFee_destroy', [ProcessingFeesController::class, 'destroy']);





        //start payment     سندات الصرف 

        Route::get('/Payment_students_show/{id}', [PaymentStudentController::class, 'show']);
        Route::get('/Payment_students_index', [PaymentStudentController::class, 'index'])->name('Payment_students_index');
        Route::post('/Payment_students_store', [PaymentStudentController::class, 'store']);
        Route::get('/Payment_students_edit/{id}', [PaymentStudentController::class, 'edit']);
        Route::post('/Payment_students_update', [PaymentStudentController::class, 'update']);
        Route::post('/Payment_students_destroy', [PaymentStudentController::class, 'destroy']);



        //start Attendaces     الحظور والغياب 
        Route::get('Attendance_index', [AttendaceController::class, 'index'])->name('Attendance_index');
        Route::post('Attendance_store', [AttendaceController::class, 'store']);
        Route::get('Attendance_show/{id}', [AttendaceController::class, 'show']);




        //start subjects      المواد الدراسية 


        Route::get('subjects_index', [SubjectController::class, 'index'])->name('subjects_index');
        Route::get('subjects_create', [SubjectController::class, 'create']);
        Route::post('subjects_store', [SubjectController::class, 'store']);
        Route::get('subjects_edit/{id}', [SubjectController::class, 'edit']);
        Route::post('subjects_update', [SubjectController::class, 'update']);

        Route::post('subjects_destroy', [SubjectController::class, 'destroy']);






        //start Quizzes  >قائمة الاختبار 
        Route::get('Quizzes_index', [QuizzController::class, 'index'])->name('Quizzes_index');
        Route::get('Quizzes_create', [QuizzController::class, 'create']);
        Route::post('Quizzes_store', [QuizzController::class, 'store']);
        Route::get('Quizzes_edit/{id}', [QuizzController::class, 'edit']);
        Route::post('Quizzes_update', [QuizzController::class, 'update']);

        Route::post('Quizzes_destroy', [QuizzController::class, 'destroy']);






        //start Quizzes  >قائمة الاسئلة 

        Route::get('questions_index', [QuestionController::class, 'index'])->name('questions_index');
        Route::get('questions_create', [QuestionController::class, 'create']);
        Route::post('questions_store', [QuestionController::class, 'store']);
        Route::get('questions_edit/{id}', [QuestionController::class, 'edit']);
        Route::post('questions_update', [QuestionController::class, 'update']);

        Route::post('questions_destroy', [QuestionController::class, 'destroy']);










        //onlineclass  > تدريس عن بعد عبر الزووم 

        Route::get('onlineclass_index', [OnlineClasseController::class, 'index'])->name('onlineclass_index');
        Route::get('onlineclass_create', [OnlineClasseController::class, 'create']);
        Route::post('onlineclass_store', [OnlineClasseController::class, 'store']);
        Route::get('onlineclass_edit/{id}', [OnlineClasseController::class, 'edit']);

        Route::post('onlineclass_update', [OnlineClasseController::class, 'update']);
        Route::post('onlineclass_destroy', [OnlineClasseController::class, 'destroy']);





        //setting  > الاعدادات

        Route::get('setting', [SettingController::class, 'index']);
        Route::post('settings_update', [SettingController::class, 'update']);






        //start library  > المكتبة 

        Route::get('library_index', [library_controllers::class, 'index'])->name('library_index');
        Route::get('library_create', [library_controllers::class, 'create']);
        Route::post('library_store', [library_controllers::class, 'store']);
        Route::get('library_edit/{id}', [library_controllers::class, 'edit']);
        Route::get('downloadAttachment/{filename}', [library_controllers::class, 'downloadAttachment']);

        Route::post('library_update', [library_controllers::class, 'update']);
        Route::post('library_destroy', [library_controllers::class, 'destroy']);
    }
);
