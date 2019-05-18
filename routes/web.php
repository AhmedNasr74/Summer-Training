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
Route::group(['prefix' => 'supervisor' , 'middleware' => 'auth'], function () {
        Route::get('/', 'SupervisorController@index');
        Route::get('/profile', 'SupervisorController@profile');
        Route::get('/training/add', 'SupervisorController@add_get_training');
        Route::post('/training/add', 'SupervisorController@add_post_training');

});
Route::group(['prefix' => 'admin' , 'middleware' => 'auth'], function () {
    Route::get('/', 'UniverstyController@index');
    Route::get('/profile', 'UniverstyController@profile');
    Route::get('/supervisor/add', 'UniverstyController@add_get_supervisor');
    Route::get('/supervaisor/delete/{id}', 'UniverstyController@delete_supervaisor');
    Route::get('/student/delete/{id}', 'UniverstyController@delete_student');
    Route::post('/supervisor/add', 'UniverstyController@add_post_supervisor');
    Route::get('/training/add', 'UniverstyController@add_get_training');
    Route::post('/training/add', 'UniverstyController@add_post_training');
    Route::post('/password/update','UniverstyController@update_password' );
//
});
Route::group(['prefix' => 'student' , 'middleware' => 'auth'], function () {
    Route::get('/', 'StudentController@index');
    Route::get('/profile', 'StudentController@profile');
    Route::post('/password/update','StudentController@update_password' );
    Route::get('/training/leave/{id}', 'StudentController@leave_training');
    Route::get('/training/enroll/{id}', "StudentController@enroll");

});

Route::get('/training/students/{id}', 'TrainingController@get_training_students');

Route::get('/training/details/{id}', "TrainingController@show");

Route::get('/search', "TrainingController@search");

Route::get('/', function () {
    $training = \App\Training::orderBy('id' , 'desc')->get();
    return view('index',['trainings' => $training]);
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');