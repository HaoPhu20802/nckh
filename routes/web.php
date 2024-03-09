<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//frontend
Route::get('/','HomeController@index' );

Route::get('/trang-chu','HomeController@index');

//backend
Route::get('/admin','AdminController@index');
Route::get('/dashboard','AdminController@show_dashboard');
Route::post('/admin-dashboard','AdminController@dashboard');
Route::get('/logout','AdminController@log_out');


// FacultyList
Route::get('/add-faculty','FacultyList@add_faculty');
Route::get('/edit-faculty/{khoa_id}','FacultyList@edit_faculty');
Route::get('/delete-faculty/{khoa_id}','FacultyList@delete_faculty');
Route::get('/all-faculty','FacultyList@all_faculty');


Route::post('/save-faculty','FacultyList@save_faculty');
Route::post('/update-faculty/{khoa_id}','FacultyList@update_faculty');


//Majors
Route::get('/add-major','MajorsController@add_major');
Route::get('/edit-major/{nganh_id}','MajorsController@edit_major');
Route::get('/delete-major/{nganh_id}','MajorsController@delete_major');
Route::get('/all-major','MajorsController@all_major');


Route::post('/save-major','MajorsController@save_major');
Route::post('/update-major/{nganh_id}','MajorsController@update_major');


// student
Route::get('/add-student','studentController@add_student');
Route::get('/edit-student/{student_id}','studentController@edit_student');
Route::get('/delete-student/{student_id}','studentController@delete_student');
Route::get('/all-student','studentController@all_student');


Route::post('/save-student','studentController@save_student');
Route::post('/update-student/{student_id}','studentController@update_student');