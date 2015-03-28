<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'PagesController@home');

Route::group(array('prefix' => 'admin'/*,'before'=>'AdminFilter'*/),function(){
    Route::get('/', 'AdminHomePageController@index');
    Route::post('/', 'AdminHomePageController@store');
    Route::get('/latest', 'AdminLatestNewsController@index');
    Route::post('/latest/activeAll', 'AdminLatestNewsController@activeAll');
    Route::post('/latest/deleteAll', 'AdminLatestNewsController@deleteAll');
    Route::get('/latest/active/{id}', 'AdminLatestNewsController@active');
    Route::delete('/latest/{id}', 'AdminLatestNewsController@destroy');
    Route::get('/latest/show/{id}', 'AdminLatestNewsController@show');
    Route::get('/getNews', 'AdminLatestNewsController@getNews');
    Route::put('/latest/{id}', 'AdminLatestNewsController@update');
    Route::post('/latest', 'AdminLatestNewsController@store');

    Route::get('/courses/all', 'AdminCoursesController@all');
    Route::post('/courses/activeAll', 'AdminCoursesController@activeAll');
    Route::post('/courses/deleteAll', 'AdminCoursesController@deleteAll');
    Route::get('/courses/active/{id}', 'AdminCoursesController@active');
    Route::resource('/courses', 'AdminCoursesController');
    Route::get('/courses', 'AdminCoursesController@pages');
    Route::get('/books', 'AdminBooksController@index');
    Route::post('/books', 'AdminBooksController@store');
    Route::get('/books/active/{id}', 'AdminBooksController@active');
    Route::get('/books/show/{id}', 'AdminBooksController@show');
    Route::post('/books/activeAll', 'AdminBooksController@activeAll');
    Route::post('/books/deleteAll', 'AdminBooksController@deleteAll');
    Route::delete('/books/{id}', 'AdminBooksController@destroy');
    Route::put('/books/{id}', 'AdminBooksController@update');

    Route::get('/exercises/all/{id}', 'AdminExercisesController@all');
    Route::get('/exercises/active/{id}', 'AdminExercisesController@active');
    Route::post('/exercises/activeAll', 'AdminExercisesController@activeAll');
    Route::post('/exercises/deleteAll', 'AdminExercisesController@deleteAll');
    Route::post('/exercises/editUpload/{id}', 'AdminExercisesController@editUpload');
    Route::resource('/exercises', 'AdminExercisesController');
    Route::get('/exercises', 'AdminExercisesController@pages');

    Route::get('/students/all/{id}', 'AdminStudentsController@all');
    Route::get('/students/gradesCourse/{id}/{exam_id}', 'AdminStudentsController@gradesCourse');
    Route::get('/students/active/{id}', 'AdminStudentsController@active');
    Route::post('/students/activeAll', 'AdminStudentsController@activeAll');
    Route::post('/students/deleteAll', 'AdminStudentsController@deleteAll');
    Route::resource('/students','AdminStudentsController');
    Route::get('/students', 'AdminStudentsController@pages');

    Route::get('/exams/all/{id}', 'AdminExamsController@all');
    Route::get('/exams/active/{id}', 'AdminExamsController@active');
    Route::post('/exams/activeAll', 'AdminExamsController@activeAll');
    Route::post('/exams/deleteAll', 'AdminExamsController@deleteAll');
    Route::resource('/exams','AdminExamsController');
    Route::get('/exams', 'AdminExamsController@pages');

    Route::get('/grades/present/{student_id}/{exam_id}','AdminExamsGradesController@present');
    Route::post('grades','AdminExamsGradesController@store');
    Route::post('grades/emailAll','AdminExamsGradesController@emailAll');

});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
