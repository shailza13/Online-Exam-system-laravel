<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('/admin','App\Http\Controllers\Admin@index');

Route::get('/admin/exam_category','App\Http\Controllers\Admin@exam_category');
// Route::get('/admin/add_new_category','App\Http\Controllers\Admin@add_new_category');
Route::post('/admin/add_new_category','App\Http\Controllers\Admin@add_new_category');

//Delete Category
Route::get('/admin/delete_category/{id}','App\Http\Controllers\Admin@delete_category');
//Edit Category
Route::get('/admin/edit_category/{id}','App\Http\Controllers\Admin@edit_category');
Route::post('/admin/edit_new_category','App\Http\Controllers\Admin@edit_new_category');
//Update Status
Route::get('/admin/category_status/{id}','App\Http\Controllers\Admin@category_status');
//Manage Exams
Route::get('/admin/manage_exam','App\Http\Controllers\Admin@manage_exam');
//Add New Exam
Route::post('/admin/add_new_exam','App\Http\Controllers\Admin@add_new_exam');
//Update Exam Status
Route::get('/admin/exam_status/{id}','App\Http\Controllers\Admin@exam_status');
//Edit Exam
Route::get('/admin/edit_exam/{id}','App\Http\Controllers\Admin@edit_exam');
Route::post('/admin/edit_new_exam/{id}','App\Http\Controllers\Admin@edit_new_exam');
//Update Exam
Route::post('/admin/edit_exam_sub','App\Http\Controllers\Admin@edit_exam_sub');
//Delete Exam
Route::get('/admin/delete_exam/{id}','App\Http\Controllers\Admin@delete_exam');
//Manage Students
Route::get('/admin/manage_students','App\Http\Controllers\Admin@manage_students');
//Add Students
Route::post('/admin/add_new_student','App\Http\Controllers\Admin@add_new_student');
//Update Exam Status
Route::get('/admin/student_status/{id}','App\Http\Controllers\Admin@student_status');
//Update Student
Route::get('/admin/edit_student/{id}','App\Http\Controllers\Admin@edit_student');
//Delete Student
Route::get('/admin/delete_student/{id}','App\Http\Controllers\Admin@delete_student');
//Edit Students
Route::post('/admin/edit_student_final','App\Http\Controllers\Admin@edit_student_final');
//Add Questions in admin exams
Route::get('/admin/add_question/{id}','App\Http\Controllers\Admin@add_question');
//Insert new Question
Route::post('/admin/add_new_question','App\Http\Controllers\Admin@add_new_question');
//Update Question Status
Route::get('/admin/question_status/{id}','App\Http\Controllers\Admin@question_status');
//Delete Questions
Route::get('/admin/delete_question/{id}','App\Http\Controllers\Admin@delete_question');
//Update Questions
Route::get('/admin/update_question/{id}','App\Http\Controllers\Admin@update_question');
//Post Update Questions
Route::post('/admin/edit_question_inner','App\Http\Controllers\Admin@edit_question_inner');




//Manage Portal
Route::get('/admin/manage_portal','App\Http\Controllers\Admin@manage_portal');
//Add New Portal
Route::post('/admin/add_new_portal','App\Http\Controllers\Admin@add_new_portal');
//Update Exam Status
Route::get('/admin/portal_status/{id}','App\Http\Controllers\Admin@portal_status');
//Delete Portal
Route::get('/admin/delete_portal/{id}','App\Http\Controllers\Admin@delete_portal');
//Edit Portal
Route::get('/admin/edit_portal/{id}','App\Http\Controllers\Admin@edit_portal');
//Edit Portal Final
Route::post('/admin/edit_portal_final','App\Http\Controllers\Admin@edit_portal_final');

//Signup
Route::get('portal/signup','App\Http\Controllers\PortalController@portal_signup');

Route::post('portal/signup_sub','App\Http\Controllers\PortalController@signup_sub');

//Login
Route::get('portal/login','App\Http\Controllers\PortalController@portal_login');
Route::post('portal/login_sub','App\Http\Controllers\PortalController@login_sub');
//Dashboard
Route::get('portal/dashboard','App\Http\Controllers\PortalOperation@dashboard');
//More info of exmas
Route::get("portal/exam_form/{id}",'App\Http\Controllers\PortalOperation@exam_form');

//Exam Form submit
Route::post('portal/exam_form_submit','App\Http\Controllers\PortalOperation@exam_form_submit');
//Print Form
Route::get("portal/print/{id}",'App\Http\Controllers\PortalOperation@print');
// Update Form
Route::get("portal/update_form",'App\Http\Controllers\PortalOperation@update_form');
//Show Form Detail
Route::get('portal/student_exam_info','App\Http\Controllers\PortalOperation@student_exam_info');
//Submit Form Detail
Route::post('portal/exam_form_edit','App\Http\Controllers\PortalOperation@exam_form_edit');
//Logout
Route::get('portal/logout','App\Http\Controllers\PortalOperation@logout');



Route::get('student/login','App\Http\Controllers\StudentController@login');
//Student Login Post
Route::post('student/login_sub','App\Http\Controllers\StudentController@login_sub');
//Student Dashboard
Route::get('student/dashboard','App\Http\Controllers\StudentOperation@dashboard');
//Student Logout
Route::get('student/logout','App\Http\Controllers\StudentOperation@logout');
//Student Exam
Route::get('student/exam','App\Http\Controllers\StudentOperation@student_exam');
//Join Exam
Route::get('student/join_exam/{id}','App\Http\Controllers\StudentOperation@join_exam');
//Submit Exam Form
Route::post('student/submit_questions','App\Http\Controllers\StudentOperation@submit_questions');
Route::get('student/show_result/{id}','App\Http\Controllers\StudentOperation@show_result');