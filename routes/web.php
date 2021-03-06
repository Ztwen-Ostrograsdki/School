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

Route::group(['prefix' => 'errors'], function() {
    
});

Route::group(['prefix' => 't&onlyforteacher&ordenied&acces&append'], function() {
    Route::resource('teacherAuthorized', 'AdminTeacherAuthorizedController')->middleware('onlyTeacher');
});

Route::group(['prefix' => 'admin'], function(){
	Route::get('/', 'AdminController@index')->name('admin.index');
	Route::post('createUser&withconfirmation&AdminAuthorization/setupAll', 'AdminController@createDefaultUser')->name('admin.create.Defaultuser');
	Route::post('registrationToTeacher/id={adminID}', 'AdminController@setAdminTeacher')->name('admin.teacher.registration');
	
	
	Route::get('teachers/cycle={params}', 'TeacherController@index')->name('teachers.ByLevel.index');
	Route::get('teachers/s={params}', 'TeacherController@index')->where('params', '[0-9]+')->name('teachers.BySubject.index');

//TEACHERS OF SECONDARY ROUTES
	// Route::resource('teachers', 'TeacherController');
/**********************************************************/


/**********************************************************/
//TEACHERS OF PRIMARY ROUTES
	// Route::resource('primaryTeacher', 'TeacherOfPrimaryController');


/**********************************************************/



//TEACHERS OF SECONDARY ROUTES
	// Route::resource('secondaryTeacher', 'TeacherOfSecondaryController');
	// Route::get('teachers/edit/l=secondary/t={t}&ind={ind}', 'TeacherOfSecondaryController@edit')->where('t', '[0-9]+')->name('secondaryTeacher.manyEdit');
	// Route::put('teachers/edit/l=secondary&t={teacher}', 'TeacherOfSecondaryController@updateTeacherClasses')->name('secondaryTeachers.update.classes');
	// Route::put('teachers/confirmation&classe/for={teacher}', 'TeacherOfSecondaryController@confirmClasses')->name('teachers.confirm.classes');
	// //A retirer
	// Route::delete('teachers/detach/t={teacher}&c={classe}', 'TeacherOfSecondaryController@detachTeacherAndClasse')->name('teachers.detach.classe');
	// 	Route::delete('teachers/detachs/t={teacher}', 'TeacherOfSecondaryController@detachTeacherAndClasse')->name('teachers.detach.classes');

/**********************************************************/
	

	// Route::get('classes/cycle={slug}', 'ClasseController@index')->name('classes.ByLevel.index');
	// Route::resource('classes', 'ClasseController');
	// Route::get('c={classe}/eleves', 'ClasseController@lister')->where('classe', '[0-9]+')->name('classes.lister');

	Route::group(['prefix' => 'director'], function(){
		Route::get('master/get&counter&for&all&data&with&authorization', 'Master\SuperAdminController@dataSender');
		Route::get('master/get&all&data&tools&with&authorization', 'Master\SuperAdminController@getTOOLS');
		Route::resource('master', 'Master\SuperAdminController')->middleware('onlySuperAdmin');

		//PUPILS
		Route::get('pupilsm/DATA&for&pupils', 'Master\PupilsController@pupilsDataSender')->name('sender');
		Route::get('pupilsm/get&classe&of&pupil&with&data&credentials/id={id}', 'Master\PupilsController@getAPupilData');
		Route::put('pupilsm/update/update&perso/id={id}', 'Master\PupilsController@persoUpdate');
		Route::put('pupilsm/restore/id={id}', 'Master\PupilsController@restore');
		Route::resource('pupilsm', 'Master\PupilsController')->middleware('onlySuperAdmin');
		

		//TEACHERS
		Route::get('teachersm/DATA&for&teachers', 'Master\TeachersController@teachersDataSender');
		Route::get('teachersm/get&classes&of&teacher&with&data&credentials/id={id}', 'Master\TeachersController@getATeacherData');
		Route::put('teachersm/update/update&classes&with&authorization/id={id}', 'Master\TeachersController@joinedTeacherToClasses');
		// Route::put('teachersm/update/update&perso/id={id}', 'Master\TeachersController@persoUpdate');
		// Route::put('teachersm/restore/id={id}', 'Master\TeachersController@restore');
		Route::resource('teachersm', 'Master\TeachersController')->middleware('onlySuperAdmin');


		Route::resource('users', 'Master\UsersController')->middleware('onlySuperAdmin');
		Route::post('teachersm/registration/u={withUser}', 'Master\TeachersController@createTeacher')->name('teachersm.create.teachers');
		Route::put('teachersm/upate&teachers&personal&data/id={teacher}/u={withUser}', 'Master\TeachersController@updatePersonalTeacherData')->name('teachersm.update.teachersPersonal');
		Route::delete('teachersm/detach/t={teacher}&c={classe}', 'Master\TeachersController@detachTeacherAndClasse')->name('teachersm.detach.classe');
		Route::delete('teachersm/detachs/t={teacher}', 'Master\TeachersController@detachTeacherAndClasse')->name('teachersm.detach.classes');

	});

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
