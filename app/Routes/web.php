<?php

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



Route::get('/','HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admission', 'HomeController@admission')->name('admission');
Route::get('/course_detail/{slug}','HomeController@CourseDetail')->name('CourseDetail');
Route::get('/contact', 'HomeController@contactPage')->name('contact');
Route::post('/contact', 'HomeController@RecieveMsg')->name('RecieveMsg');
Route::get('courses/{slug}', 'HomeController@Coursedetails')->name('coursedetail')->middleware('auth');
Route::post('/uploadNotes', 'NotesController@upload')->name('uploadNotes');

Route::get('/LoginForUsers','HomeController@login')->name('loginpage')->middleware('guest');
Route::post('/register', 'Auth\RegisterController@register')->name('registers');
Route::post('/StudentRegister', 'Student\RegisterController@register')->name('student.registers');
Route::post('/StudentLogin', 'Student\LoginController@login')->name('student.login');
Route::get('/StudentLogin', 'Student\LoginController@loginpage')->name('student.loginpage')->middleware('guest');
Route::get('/student/home','Student\HomeController@index')->name('student.home')->middleware('inactive_student');
Route::get('/student/not_active','Student\HomeController@ActiveNotice')->name('student.notice')->middleware('active_student');


// for teacher

Route::post('/TeacherRegister', 'Teacher\RegisterController@register')->name('teacher.registers');
Route::post('/TeacherLogin', 'Teacher\LoginController@login')->name('teacher.login');
Route::get('/TeacherLogin', 'Teacher\LoginController@loginpage')->name('teacher.loginpage')->middleware('guest');
Route::get('/teacher/home','Teacher\HomeController@index')->name('teacher.home');
Route::get('/teacher/courses','Teacher\HomeController@index')->name('teacher.courses');









Route::name('cpannel.')->prefix('cpannel')->group(function () {
Route::post('/masterLogin', 'SuperAdmin\LoginController@login')->name('master.login');
Route::post('/adminLogin', 'Admin\LoginController@login')->name('admin.login');

// for admins
Route::name('admin.')->prefix('admin')->group(function () {
Route::get('/', 'Admin\LoginController@loginpage')->name('loginpage')->middleware('auth.admin');
Route::get('/home','Admin\HomeController@index')->name('home');
Route::post('/logout', 'Admin\LoginController@logout')->name('logout');
Route::get('/teachers', 'Admin\HomeController@teachers')->name('teachers');
Route::get('/students', 'Admin\HomeController@students')->name('students');
Route::post('/updatestatus_student', 'Admin\HomeController@statusStudents')->name('statusStudents');
Route::post('/updatestatus_teacher', 'Admin\HomeController@statusTeachers')->name('statusTeachers');

});

// master
Route::name('master.')->prefix('master')->group(function () {
Route::get('/loginforMaster', 'SuperAdmin\LoginController@loginpage')->name('loginpage')->middleware('auth.master');
Route::get('/home', 'SuperAdmin\HomeController@index')->name('home');
Route::get('/', 'SuperAdmin\HomeController@index');
Route::get('/admins', 'SuperAdmin\HomeController@admins')->name('admins');
Route::get('/addAdmins', 'SuperAdmin\HomeController@addAdmins')->name('addAdmins');
Route::post('/storeAdmins', 'SuperAdmin\HomeController@storeAdmins')->name('storeAdmins');
Route::post('/updateAdmins', 'SuperAdmin\HomeController@updateAdmins')->name('updateAdmins');
Route::post('/logout', 'SuperAdmin\LoginController@logout')->name('logout');
Route::post('/updatestatus_admin', 'SuperAdmin\HomeController@statusAdmins')->name('statusAdmins');
Route::get('/ContactDetails', 'SuperAdmin\HomeController@ContactDetails')->name('contactDetails');
Route::post('/ContactDetails', 'SuperAdmin\HomeController@UpdateContactDetails')->name('UpdateContactDetails');
Route::get('/courses', 'SuperAdmin\CourseController@index')->name('courses');
Route::get('courses/create', 'SuperAdmin\CourseController@create')->name('addcourses');
Route::post('courses/create', 'SuperAdmin\CourseController@store')->name('storeCourses');
Route::post('updatestatus_course', 'SuperAdmin\CourseController@updateStatus')->name('updateStatus');
Route::get('/addnotes', 'NotesController@addNotes')->name('addnotes')->middleware('master');
Route::post('/addnotes', 'NotesController@StoreNotes')->name('addnotes');




});
});
