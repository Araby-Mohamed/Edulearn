<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login','LoginController@login');

Route::group(['middleware' => 'auth:api'],function (){
    Route::get('logout','LoginController@logout');
    // Professor Name Space.
    Route::group(['namespace' => 'professor'],function() {
        // Events
        Route::get('events','EventsController@index');
        // Profile
        Route::get('profile','ProfileController@index');
        Route::post('profile/update','ProfileController@update');
        // Subject
        Route::get('subject','SubjectController@index');
        // Material
        Route::get('material/{id}','MaterialController@index');
        Route::post('material/create','MaterialController@store');
        Route::post('material/update/{id}','MaterialController@update');
        Route::get('material/delete/{id}','MaterialController@destroy');
        // Student
        Route::get('student','StudentController@index');
        // Exam
        Route::get('exam','ExamController@index');
        Route::post('exam/create','ExamController@store');
        Route::post('exam/update/{id}','ExamController@update');
        Route::get('exam/delete/{id}','ExamController@destroy');
        // Tasks
        Route::get('task','TaskController@index');
        Route::post('task/store','TaskController@store');
        Route::post('task/update/{id}','TaskController@update');
        Route::get('task/delete/{id}','TaskController@destroy');
        Route::get('task/student/{id}','TaskController@uploadTask');
        // Question Bank
        Route::get('question_bank/{id}','QuestionBankController@show');
        Route::post('question_bank/store','QuestionBankController@store');
        Route::post('question_bank/update/{id}','QuestionBankController@update');
        Route::get('question_bank/delete/{id}','QuestionBankController@destroy');
        // Message
        Route::get('message/{id}','MessageController@show');
        Route::post('message/{id}','MessageController@store');
        // Score
        Route::get('score/{id}','ScoreController@show');
        Route::post('score/update/{id}','ScoreController@update');
    });

    // Student Name Space.
    Route::group(['namespace' => 'student'],function() {
        // Profile
        Route::get('student/profile','ProfileController@index');
        Route::get('student/profile/update','ProfileController@update');
        // Exam
        Route::get('student/exam','ExamController@index');
        // Material
        Route::get('student/material/{id}','MaterialController@index');
        // Message
        Route::get('student/message/{id}','MessageController@show');
        Route::post('student/message/{id}','MessageController@store');
        // Question Bank
        Route::get('student/question_bank/{id}','QuestionBankController@show');
        // Score
        Route::get('student/score','ScoreController@index');
        // Subject
        Route::get('student/subject','SubjectController@index');
        // Task
        Route::get('student/task','TaskController@index');
        Route::post('student/task/{id}','TaskController@store');
    });

});
