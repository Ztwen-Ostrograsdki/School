<?php

namespace App\Http\Controllers;

use App\Helpers\Tools\Tools;
use App\Http\Requests\ClasseRequest;
use App\ModelHelper;
use App\Models\Classe;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ClasseController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(string $slug = null)
    {

 
        if ($slug === null) {
            $classes = Classe::all();
        }
        else{
            $classes = Classe::whereLevel($slug)->get();
        }

        $table = $classes->toArray();

        return view('admin.classes.index', compact('classes', 'slug', 'table'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $classe)
    {
        $classe = Classe::find($classe);
        // $user = auth()->user();
        // dd(auth()->user()->id);
        
        // $this->authorize('view', $user);
        
        if (Gate::allows('isAccepted')) {
            $helper  = new ModelHelper($classe);
            $pp = $classe->teacher;
            $respo1 = $classe->respo1();
            $respo2 = $classe->respo2();


            $males = $helper->finder('male');
            $females = $helper->finder('female');
            return view('admin.classes.profil', compact('classe', 'males', 'females', 'pp', 'respo1', 'respo2'));
        }
        else{
            abort(403, 'Unauthorized for this page');
        }

        
        
    }

    public function lister(int $classe)
    {
        $classe = Classe::find($classe);
        $pupils = $classe->pupils()->oldest('name')->get();
        if ($classe->level === 'primary') {
            $subjects = Subject::whereLevel('primary')->oldest('name')->get();
        }
        else{
            $subjects = $classe->subjects()->oldest('name')->get();
        }
        return view('admin.classes.pupils.index', compact('classe', 'pupils', 'subjects'));
    }

    /**
     * To get more informations about the marks of a classe in a specific subject
     * @param  int    $classe  [description]
     * @param  int    $subject [description]
     * @return  \Illuminate\Http\Response          [description]
     */
    public function marks(int $classe, int $subject)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $months = Tools::months();
        $classe = Classe::find((int)$id);
        
        if ($classe->level == 'secondary') {
            $teachers = $classe->teachers;
        }
        elseif($classe->level == 'primary'){
            $teachers = Teacher::whereLevel('primary')->oldest('name')->get();
        }
        $pupils = $classe->pupils;

        $respo1 = $classe->respo1;
        $respo2 = $classe->respo2;
        $pp = $classe->teacher_id;
        $month = $classe->month;
        $year = $classe->year;

        return view('admin.classes.edits.classeInfos', compact('classe', 'teachers', 'pupils', 'respo1', 'respo2', 'pp', 'month', 'year', 'months'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClasseRequest $request, $id)
    {
        if (auth()->check()) {
            $editor = auth()->user()->name;
        }
        else{
            $editor = null;
        }
        $classe = Classe::find((int)$id);
        $classe->name = $request->name;
        $classe->teacher_id = $request->pp ? (int)$request->pp : null;
        $classe->respo1 = $request->respo1 ? (int)$request->respo1 : null;
        $classe->respo2 = $request->respo2 ? (int)$request->respo2 : null;
        $classe->month = $request->month;
        $classe->editor = $editor;
        $classe->year = (int)$request->year;

        if ($classe->level == "primary" && $request->pp !== null) {
            $teacher = Teacher::find((int)$request->pp);
            $teacher->classes()->attach($classe->id);
        }

        $classe->save();
        return redirect()->route('classes.show', $classe->id)->with('info', "Mise à jour réussie.")->with('type', 'info-success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
