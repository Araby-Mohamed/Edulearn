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

Route::group(['namespace' => 'Front'],function() {
    //Route::get('/','HomeController@index');
});

Auth::routes(['register' => false]);

// Student Middleware.
Route::group(['middleware' => 'Student'],function (){
    Route::group(['namespace' => 'Student'],function() {
        // Events
        Route::get('home','EventsController@index');
        // Task
        Route::get('student/task','TaskController@index');
        Route::post('student/task/upload/{id}','TaskController@store');
        // Subject
        Route::get('student/subject','SubjectController@index');
        // Material
        Route::get('student/material/{id}','MaterialController@index');
        // Message
        Route::get('student/message/{id}','MessageController@show');
        Route::post('student/message/store/{id}','MessageController@store');
        // Exam
        Route::get('student/exam','ExamController@index');
        // Route Question Bank
        Route::get('student/question_bank','QuestionBankController@index');
        Route::get('student/question_bank/{id}','QuestionBankController@show');
        // Route Profile
        Route::get('student/profile','ProfileController@index');
        Route::post('student/profile/update','ProfileController@update');
        // Route Score
        Route::get('student/score','ScoreController@index');
    });
});

// Professor Middleware.
Route::group(['middleware' => 'Professor'],function (){
    Route::group(['namespace' => 'Professor'],function() {

        Route::get('/', 'HomeController@index')->name('home');

        // Route Profile
        Route::get('profile','ProfileController@index');
        Route::post('profile/update','ProfileController@update');
        // Route Subject
        Route::get('subject','subjectController@index');
        // Route Material
        Route::get('material/{id}','MaterialController@index');
        Route::get('material','MaterialController@create');
        Route::post('material/create','MaterialController@store');
        Route::get('material/edit/{id}','MaterialController@edit');
        Route::post('material/update/{id}','MaterialController@update');
        Route::get('material/delete/{id}','MaterialController@destroy');
        // Route Tasks
        Route::get('task/create','TaskController@create');
        Route::post('task/store','TaskController@store');
        Route::get('task','TaskController@index');
        Route::get('task/edit/{id}','TaskController@edit');
        Route::post('task/update/{id}','TaskController@update');
        Route::get('task/delete/{id}','TaskController@destroy');
        Route::get('task/student/{id}','TaskController@uploadTask');
        // Route Question Bank
        Route::get('question_bank','QuestionBankController@index');
        Route::get('question_bank/create','QuestionBankController@create');
        Route::post('question_bank/store','QuestionBankController@store');
        Route::get('question_bank/{id}','QuestionBankController@show');
        Route::get('question_bank/edit/{id}','QuestionBankController@edit');
        Route::post('question_bank/update/{id}','QuestionBankController@update');
        Route::get('question_bank/delete/{id}','QuestionBankController@destroy');
        // Route Exam
        Route::get('exam','ExamController@index');
        Route::get('exam/create','ExamController@create');
        Route::post('exam/store','ExamController@store');
        Route::get('exam/edit/{id}','ExamController@edit');
        Route::post('exam/update/{id}','ExamController@update');
        Route::get('exam/delete/{id}','ExamController@destroy');
        //Route Student
        Route::get('student','StudentController@index');
        // Route Message
        Route::get('message/{id}','MessageController@show');
        Route::post('message/store/{id}','MessageController@store');
        // Route Score
        Route::get('score','ScoreController@index');
        Route::get('score/{id}','ScoreController@show');
        Route::post('score/update/{id}','ScoreController@update');

    });
});


// Route Admin
Route::prefix('admin')->group(function () {
  // Auth Admin & Employee
  Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

  Route::group(['namespace' => 'Admin'],function(){
    // Admin Middleware
    Route::group(['middleware' => 'auth:admin'],function () {
        // Home Dashboard
        Route::get('/', 'AdminController@index')->name('admin.dashboard');
        // Admin
        Route::get('admins','AdminsController@index');
        Route::get('admins/create','AdminsController@create');
        Route::post('admins/store','AdminsController@store');
        Route::get('admins/{id}','AdminsController@show');
        Route::get('admins/edit/{id}','AdminsController@edit');
        Route::post('admins/update/{id}','AdminsController@update');
        Route::get('admins/update/{id}','AdminsController@update');
        Route::get('admins/delete/{id}','AdminsController@destroy');
        // Profile
        Route::get('profile','ProfileController@index');
        Route::post('profile','ProfileController@update');
        // Logout
        Route::get('logout', 'ProfileController@logout');

        Route::resources([
            // Employee
            'employee'  => 'EmployeeController',
            // Student
            'student'   => 'StudentController',
            // Professor
            'professor' => 'ProfessorController',
            // Subject
            'subject'   => 'SubjectController',
            // Lecture Table
            'table'     => 'LectureTableController',
            // Event
            'event'     => 'EventsController',
            // Slider
            'slider'    => 'SliderController'
        ]);

        // Material Route
        Route::get('subject/{id}/material','MaterialController@index');
        // Score Rout
        Route::get('score/{id}','StudentController@score');
        // Question Bank
        Route::get('question_bank','QuestionBankController@index');
        // Exam Route
        Route::get('exam','ExamController@index');
    });
  });
});

