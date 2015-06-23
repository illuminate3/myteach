<?php

Route::group(array('middleware' => 'auth'), function(){
    Route::controller('filemanager', 'FilemanagerLaravelController');
});

Route::get('/', 'PagesController@index');
Route::get('/cv', 'PagesController@cvPage');
Route::get('/persian', 'PagesController@persianPage');
Route::get('/pages/home', 'PagesController@home');
Route::get('/pages/cv', 'PagesController@cv');
Route::get('/pages/persian', 'PagesController@persian');
Route::get('/pages/news', 'PagesController@news');
Route::get('/pages/news/{id}', 'PagesController@showNews');

Route::get('/courses', 'CoursesController@index');
Route::get('/courses/all', 'CoursesController@all');
Route::get('/homeworks/{id}', 'HomeworksController@show');
Route::get('/exercise/{id}', 'HomeworksController@exercise');
Route::get('/lesson/{id}', 'LessonsController@show');

Route::get('/gallery', 'GalleryController@index');




/*
|--------------------------------------------------------------------------
| Admin Section
|--------------------------------------------------------------------------
*/
Route::get('adminLogin',array('middleware' => 'guest','uses'=>'SessionController@login'));
Route::post('adminLogin','SessionController@valid');
Route::get('logout',array('middleware'=>['adminAuth'],'uses'=>'SessionController@destroy'));

Route::group(array('prefix' => 'admin','middleware'=>['adminAuth']),function(){
    Route::get('/', 'AdminHomePageController@index');
    Route::post('/{item}', 'AdminHomePageController@store');
    Route::get('/pages/{item}', 'AdminHomePageController@pages');
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
    Route::post('/coursesEmail/{id}', 'AdminCoursesController@email');
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
    Route::get('/students/grades/{id}', 'AdminStudentsController@grades');
    Route::post('/studentsEmail/{id}', 'AdminStudentsController@email');
    Route::resource('/students','AdminStudentsController');
    Route::get('/students', 'AdminStudentsController@pages');

    Route::get('/exams/all/{id}', 'AdminExamsController@all');
    Route::get('/exams/active/{id}', 'AdminExamsController@active');
    Route::post('/exams/activeAll', 'AdminExamsController@activeAll');
    Route::post('/exams/deleteAll', 'AdminExamsController@deleteAll');
    Route::get('/exams/grades/{id}', 'AdminExamsController@gradesPlot');
    Route::resource('/exams','AdminExamsController');
    Route::get('/exams', 'AdminExamsController@pages');

    Route::get('/grades/present/{student_id}/{exam_id}','AdminExamsGradesController@present');
    Route::post('grades','AdminExamsGradesController@store');
    Route::post('grades/emailAll','AdminExamsGradesController@emailAll');

    Route::get('/gallery/all', 'AdminGalleryController@all');
    Route::post('/galleryEdit/{id}', 'AdminGalleryController@updateGallery');
    Route::resource('/gallery','AdminGalleryController');

    Route::get('/cv', 'AdminCvController@index');
    Route::get('/persian', 'AdminPersianController@index');

});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
