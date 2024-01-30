<?php

// ========FrontEnd=====

use App\Http\Controllers\FrontEnd\PageController;


// ======End FrontEnd=====

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentOperation;
Use App\Http\Controllers\AppAuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\ClassController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// =============================== FrontEnd Routes Are Here =======================

Route::get('/', [PageController::class, 'index']);
Route::get('about', [PageController::class, 'about'])->name('about');
Route::get('subject', [PageController::class, 'subject'])->name('subject');
Route::get('notes', [PageController::class, 'notes'])->name('notes');
Route::get('team', [PageController::class, 'team'])->name('team');
Route::get('testimonial', [PageController::class, 'testimonial'])->name('testimonial');
Route::get('contact', [PageController::class, 'contact'])->name('contact');

// =======================Student Registration Form Submit======================

Route::get('student-join', [PageController::class, 'studentlogin'])->name('student-login');
Route::get('/frontendgetSubjectsByClass/{classId}', [PageController::class, 'getSubjectsByClass'])->name('frontendgetSubjectsByClass');
Route::post('/student-registration-form-submit', [PageController::class, 'studentregistrationformsubmit'])->name('student-registration-form-submit');

// =========================End Student Registration Form Submit===================================

Route::get('teacher-registration', [PageController::class, 'teacherregistration'])->name('teacher-registration');
Route::post('teacher-reg-submit', [PageController::class, 'teacherregsubmit'])->name('teacher-reg-submit');




// ===================================FrontEnd Routes End ===========================


Route::get('/home', function () {
    return view('home');
})->middleware(['auth'])->name('home');

// ===========================Teacher Panel==================================
Route::prefix('teacher')->middleware('theme:dashboard')->name('admin.')->group(function(){

        Route::middleware(['auth:admin'])->group(function(){

            Route::get('/dashboard',[AdminController::class,'index']);
            Route::get('/exam_category',[AdminController::class,'exam_category']);
            Route::get('/delete_category/{id}',[AdminController::class,'delete_category']);
            Route::get('/edit_category/{id}',[AdminController::class,'edit_category']);
            Route::get('/category_status/{id}',[AdminController::class,'category_status']);
            Route::get('/manage_exam',[AdminController::class,'manage_exam']);
            Route::get('/exam_status/{id}',[AdminController::class,'exam_status']);
            Route::get('/delete_exam/{id}',[AdminController::class,'delete_exam']);
            Route::get('/edit_exam/{id}',[AdminController::class,'edit_exam']);
            Route::get('/manage_students',[AdminController::class,'manage_students']);
            Route::get('/student_status/{id}',[AdminController::class,'student_status']);
            Route::get('/delete_students/{id}',[AdminController::class,'delete_students']);
            Route::get('/add_questions/{id}',[AdminController::class,'add_questions'])->name('add_questions');
            Route::get('/question_status/{id}',[AdminController::class,'question_status']);
            Route::get('/delete_question/{id}',[AdminController::class,'delete_question']);
            Route::get('/update_question/{id}',[AdminController::class,'update_question']);
            Route::get('/registered_students',[AdminController::class,'registered_students']);
            Route::get('/delete_registered_students/{id}',[AdminController::class,'delete_registered_students']);
            Route::get('/apply_exam/{id}',[AdminController::class,'apply_exam']);
            Route::get('/admin_view_result/{id}',[AdminController::class,'admin_view_result']);

            Route::post('/edit_question_inner',[AdminController::class,'edit_question_inner']);
            Route::post('/add_new_question',[AdminController::class,'add_new_question']);
            Route::post('/edit_students_final',[AdminController::class,'edit_students_final']);
            Route::post('/add_new_exam',[AdminController::class,'add_new_exam']);
            Route::post('/add_new_category',[AdminController::class,'add_new_category']);
            Route::post('/edit_new_category',[AdminController::class,'edit_new_category']);
            Route::post('/edit_exam_sub',[AdminController::class,'edit_exam_sub']);
            Route::post('/add_new_students',[AdminController::class,'add_new_students']);

        });



});

// ========================================End Teacher Panel===============================

// ====================================== Student Panel ============================
Route::prefix('student')->middleware('theme:dashboard')->name('student.')->group(function(){

    // Auth::routes(['register' => false]);

    Route::middleware(['auth:web'])->group(function(){
        Route::get('/dashboard',[StudentOperation::class,'dashboard']);

        Route::get('/exam',[StudentOperation::class,'exam'])->name('exam');;
        Route::get('/join_exam/{id}',[StudentOperation::class,'join_exam'])->name('join_exam');
        Route::post('/submit_questions',[StudentOperation::class,'submit_questions']);
        Route::get('/show_result/{id}',[StudentOperation::class,'show_result']);
        Route::get('/apply_exam/{id}',[StudentOperation::class,'apply_exam'])->name('apply_exam');
        Route::get('/view_result/{id}',[StudentOperation::class,'view_result']);
        Route::get('/view_answer/{id}',[StudentOperation::class,'view_answer']);
        Route::get('/save_time/{time}',[StudentOperation::class,'save_time']);
        Route::get('/end_time_session',[StudentOperation::class,'end_time_session']);




        Route::get('/logout',[AuthenticatedSessionController::class,'destroy']);
    });


});
// ===========================End Student Panel==========================


// ==============================Admin Panel======================
Route::prefix('superadmin')->as('superadmin.')->group(function () {

    Route::get('/login', [AppAuthController::class, 'login'])->name('login');
    Route::post('/loginAction', [AppAuthController::class, 'loginAction'])->name('loginAction');
    Route::get('/logout', [AppAuthController::class, 'logout'])->name('logout');

    Route::middleware('admin')->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

         // ================================== Setting ====================================================

        Route::group(['as' => 'setting.', 'prefix' => 'setting'], function () {
            Route::get('/list', [SettingController::class, 'index'])->name('list');
            Route::get('/add', [SettingController::class, 'create'])->name('add');
            Route::post('/submit', [SettingController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [SettingController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [SettingController::class, 'update'])->name('update');
            Route::get('/delete/{id}', [SettingController::class, 'destroy'])->name('delete');
        });

      // ================================== End Setting ====================================================


         // ================================== Subject ====================================================

        Route::group(['as' => 'subject.', 'prefix' => 'subject'], function () {
            Route::get('/list', [SubjectController::class, 'index'])->name('list');
            Route::get('/add', [SubjectController::class, 'create'])->name('add');
            Route::post('/submit', [SubjectController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [SubjectController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [SubjectController::class, 'update'])->name('update');
            Route::get('/delete/{id}', [SubjectController::class, 'destroy'])->name('delete');
        });

      // ================================== End Subject ====================================================


         // ================================== Class ====================================================

        Route::group(['as' => 'class.', 'prefix' => 'class'], function () {
            Route::get('/list', [ClassController::class, 'index'])->name('list');
            Route::get('/add', [ClassController::class, 'create'])->name('add');
            Route::post('/submit', [ClassController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [ClassController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [ClassController::class, 'update'])->name('update');
            Route::get('/delete/{id}', [ClassController::class, 'destroy'])->name('delete');
        });

      // ================================== End Class ====================================================


      // ================================== Department ====================================================

            Route::group(['as' => 'department.', 'prefix' => 'department'], function () {
                Route::get('/list', [DepartmentController::class, 'index'])->name('list');
                Route::get('/add', [DepartmentController::class, 'create'])->name('add');
                Route::post('/submit', [DepartmentController::class, 'store'])->name('store');
                Route::get('/edit/{id}', [DepartmentController::class, 'edit'])->name('edit');
                Route::post('/update/{id}', [DepartmentController::class, 'update'])->name('update');
                Route::get('/delete/{id}', [DepartmentController::class, 'destroy'])->name('delete');
        });

      // ================================== End Department ====================================================


      // ================================== Teacher ====================================================

           Route::group(['as' => 'teacher.', 'prefix' => 'teacher'], function () {
            Route::get('/list', [TeacherController::class, 'index'])->name('list');
            Route::get('/appiled-teacher', [TeacherController::class, 'appliedteacher'])->name('appiled-teacher');
            Route::get('/add', [TeacherController::class, 'create'])->name('add');
            Route::post('/submit', [TeacherController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [TeacherController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [TeacherController::class, 'update'])->name('update');
            Route::get('/delete/{id}', [TeacherController::class, 'destroy'])->name('delete');
        });

      // ================================== End Teacher ====================================================


      // ================================== Student ====================================================

            Route::group(['as' => 'student.', 'prefix' => 'student'], function () {
                Route::get('/list', [StudentController::class, 'index'])->name('list');
                Route::get('/applied-student-list', [StudentController::class, 'applystudent'])->name('applied-student-list');
                Route::get('/add', [StudentController::class, 'create'])->name('add');
                Route::post('/submit', [StudentController::class, 'store'])->name('store');
                Route::get('/edit/{id}', [StudentController::class, 'edit'])->name('edit');
                Route::post('/update/{id}', [StudentController::class, 'update'])->name('update');
                Route::get('/delete/{id}', [StudentController::class, 'destroy'])->name('delete');
                Route::get('/getSubjectsByClass/{classId}', [StudentController::class, 'getSubjectsByClass'])->name('getSubjectsByClass');

            });


      // ================================== End Student ====================================================




        });

      });

      // ===============================End Admin Panel===================


require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
