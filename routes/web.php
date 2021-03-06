<?php

use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Auth::routes();


Route::middleware('auth')->group(function(){
    //Route::get('/', function () {
     //   return view('admin.layouts.app');

    //})->name('dashboard');
    Route::resource('/', 'DashboardController');
    Route::get('/home', 'HomeController@index');
    Route::resource('/users','UserController');
    Route::resource('/categories', 'CategoryController');
    Route::resource('/courses', 'CourseController');
    Route::put('/courses/enroll/{course}', 'CourseController@enroll')->name('courses.enroll');
});