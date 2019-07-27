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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (!Auth::guard('student')->guest()){
        return redirect('/student');
    }
    return view('student/auth/login');
});

Route::resource('category', 'CategoryController');

Route::resource('question', 'QuestionController');

//Route::group(['middleware'=>['auth:student']],function (){
//
//});

Route::get('/paper/{id}','StudentController@showquestion')->name('paper.show');

Route::post('/submit','StudentController@showresult')->name('paper.submit');

Route::get('/papers','StudentController@showpaperlist')->name('paper.list');

Route::get('/student/marks','QuestionController@marks')->name('student.marks');
