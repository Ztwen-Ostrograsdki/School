<?php

namespace App\Providers;

use App\Helpers\Tools\Tools;
use App\Models\Classe;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        View::composer(['admin.teachers.index', 'admin.pupils.index', 'admin.classes.index', 'directors.pupils.index', 'directors.teachers.index'], function($view){

            $view->with('levels', Tools::levels());
        });

        View::composer(['admin.teachers.index'], function($view){

            $view->with('secondarySubjects', Subject::whereLevel('secondary')->get());
        });

        View::composer(['layouts.public', 'layouts.director', 'layouts.admin', 'directors.teachers.edits.personal'], function($view){

            $view->with('subjects', Subject::whereLevel('secondary')->get());
            $view->with('classes', Classe::whereLevel('primary')->get());
            $view->with('months', Tools::months());
            $view->with('roles', Tools::roles());
        });

        View::composer(['admin.pupils.index'], function($view){

            $view->with('classes', Classe::all());
        });



        
        Blade::if ('superAdmin', function () {
            return auth()->check() && in_array('superAdmin', auth()->user()->getRoles());
        });
        Blade::if ('notSuperAdmin', function () {
            return auth()->check() && !in_array('superAdmin', auth()->user()->getRoles());
        });
        Blade::if ('admin', function () {
            if (auth()->user()) {
                return auth()->check() && in_array('superAdmin', auth()->user()->getRoles()) || in_array('admin', auth()->user()->getRoles());
            }
            return false;
            
        });
        Blade::if ('notAdmin', function () {
            if (auth()->user()) {
                return auth()->check() && !in_array('superAdmin', auth()->user()->getRoles()) && !in_array('admin', auth()->user()->getRoles());
            }
            return true;
        });

        Blade::if ('isAdmin', function ($user) {
            $roles = $user->getRoles();
            return in_array('superAdmin', $roles) || in_array('admin', $roles);
        });
        Blade::if ('isNotAdmin', function ($user) {
            $roles = $user->getRoles();
            return !in_array('superAdmin', $roles) && !in_array('admin', $roles);
        });
        Blade::if ('isTeacher', function () {
            return auth()->user()->teachers->toArray() !== [];
        });
        Blade::if ('isNotTeacher', function () {
            return auth()->user()->teachers->toArray() == [];
        });
        Blade::if ('selfTeacher', function ($teacher) {
            return (auth()->user()->teachers->toArray() !== []) && (auth()->user()->teacher()->id === $teacher->id);
        });
        Blade::if ('isUser', function ($user) {
            return $user->role === 'user'; 
        });

        Blade::if ('hasClasses', function ($teacher) {
            return $teacher->classes->count() > 0;
        });
        Blade::if ('hasNotClasses', function ($teacher) {
            return $teacher->classes->count() === 0;
        });

        Blade::if ('isPrincipal', function ($teacher) {
            return $teacher->classe !== null;
        });
        Blade::if ('isSecondaryTeacher', function ($teacher) {
            return $teacher->level == 'secondary';
        });
        Blade::if ('isPrimaryTeacher', function ($teacher) {
            return $teacher->level == 'primary';
        });

        Blade::if ('isSecondary', function ($level) {
            return $level == 'secondary';
        });
        Blade::if ('isPrimary', function ($level) {
            return $level == 'primary';
        });
        Blade::if ('urlIs', function ($url) {
            return Route::getCurrentRoute()->uri == $url;
        });

        Blade::if ('urlNot', function ($url) {
            return Route::getCurrentRoute()->uri !== $url;
        });
        
        Route::resourceVerbs([ 
               'create' => 'creer',
               'edit' => 'modifier',
               'destroy' => 'bloquer',
               'show' => 'profil',
        ]);   
    }
}
