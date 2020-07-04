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

        View::composer(['admin.teachers.index', 'admin.pupils.index', 'admin.classes.index'], function($view){

            $view->with('levels', Tools::levels());
        });

        View::composer(['admin.teachers.index'], function($view){

            $view->with('secondarySubjects', Subject::whereLevel('secondary')->get());
        });

        View::composer(['layouts.public'], function($view){

            $view->with('subjects', Subject::whereLevel('secondary')->get());
            $view->with('classes', Classe::whereLevel('primary')->get());
            $view->with('months', Tools::months());
        });

        

        View::composer(['admin.pupils.index'], function($view){

            $view->with('classes', Classe::all());
        });
        
        Blade::if ('admin', function () {
            return auth()->check() && (auth()->user()->role === 'admin' || auth()->user()->id === 1); 
        });
        Blade::if ('notAdmin', function () {
            return auth()->check() && auth()->user()->role !== 'admin'; 
        });
        Blade::if ('isAdmin', function ($user) {
            return $user->role === 'admin';
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
