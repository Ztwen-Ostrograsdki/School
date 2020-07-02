<?php

use App\Mail\Users;

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



Route::get('/', function () {
    return view('public.home');
});

Route::group(['prefix' => 'admin'], function(){
	Route::get('/', 'AdminController@index')->name('admin.index');
	
	Route::get('teachers/cycle={params}', 'TeacherController@index')->name('teachers.ByLevel.index');
	Route::get('teachers/s={params}', 'TeacherController@index')->where('params', '[0-9]+')->name('teachers.BySubject.index');

//TEACHERS OF SECONDARY ROUTES
	Route::resource('teachers', 'TeacherController');
	Route::delete('teachers/detachs/t={teacher}', 'TeacherController@detachTeacherAndClasse')->name('teachers.detach.classes');
/**********************************************************/


/**********************************************************/
//TEACHERS OF PRIMARY ROUTES
	Route::resource('primaryTeacher', 'TeacherOfPrimaryController');


/**********************************************************/



//TEACHERS OF SECONDARY ROUTES
	Route::resource('secondaryTeacher', 'TeacherOfSecondaryController');
	Route::get('teachers/edit/l=secondary/t={t}&ind={ind}', 'TeacherOfSecondaryController@edit')->where('t', '[0-9]+')->name('secondaryTeacher.manyEdit');
	Route::put('teachers/edit/l=secondary&t={teacher}', 'TeacherOfSecondaryController@updateTeacherClasses')->name('secondaryTeachers.update.classes');
	Route::put('teachers/confirmation&classe/for={teacher}', 'TeacherOfSecondaryController@confirmClasses')->name('teachers.confirm.classes');
	Route::delete('teachers/detach/t={teacher}&c={classe}', 'TeacherOfSecondaryControlle@detachTeacherAndClasse')->name('teachers.detach.classe');
/**********************************************************/
	

	Route::get('classes/cycle={slug}', 'ClasseController@index')->name('classes.ByLevel.index');
	Route::resource('classes', 'ClasseController');
	Route::get('c={classe}/eleves', 'ClasseController@lister')->where('classe', '[0-9]+')->name('classes.lister');

	Route::get('pupils/cycle={params}', 'PupilController@index')->name('pupils.ByLevel.index');
	Route::get('pupils/classe={params}', 'PupilController@index')->where('params', '[0-9]+')->name('pupils.ByClasse.index');
	Route::resource('pupils', 'PupilController');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
