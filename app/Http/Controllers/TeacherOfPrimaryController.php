<?php

namespace App\Http\Controllers;

use App\Helpers\Tools\Tools;
use App\Http\Controllers\TeacherController;
use App\Http\Requests\PrimaryTeachersRequest;
use App\Http\Requests\TeachersRequest;
use App\Models\Classe;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TeacherOfPrimaryController extends Controller
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
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $level = 'primary';
        $levelName = 'Primaire';
        $classes = Classe::whereLevel($level)->get();
        $levels = Tools::levels();
        $months = Tools::months();

        return view('admin.teachers.edits.create', compact('level', 'classes', 'levels', 'months', 'levelName'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeachersRequest $request)
    {
        $request->subject_id = null;
        $request->creator = auth()->user()->name;
        $input = $request->except('classe');

        Teacher::create($input);
        $teacher = Teacher::all()->last();

        TeacherController::insertIntoUser($request, $teacher);

        if ($request->filled('classe')) {
            $classe = Classe::find((int)$request->classe);
            $classe->teacher_id = $teacher->id;
            $classe->save();
            $teacher->classes()->attach($classe->id);

            return redirect()->route('teachers.show', $teacher->id)->with('info', "Insertion réussie. Les informations du maître $teacher->name ont bien été insérées dans les données de l'école. Il garde la classe de $classe->name")->with('type', 'info-success');
        }

        return redirect()->route('teachers.show', $teacher->id)->with('info', "Insertion réussie. Les informations du maître $teacher->name ont bien été insérées dans les données de l'école")->with('type', 'info-success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $t)
    {
        $teacher = Teacher::find($t);
        $months = Tools::months();
        $levels = Tools::levels();

        $classes = Classe::whereLevel('primary')->get();
        return view('admin.teachers.edits.personal', compact('teacher', 'levels', 'classes', 'months'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PrimaryTeachersRequest $request, int $id)
    {
        $request->editor = auth()->user()->name;
        $teacher = Teacher::find((int)$id);
        $input = $request->except(['classe', 'id']);

        TeacherController::updateTeacherUserInfo($teacher, $request);
        
        if ($request->filled('classe')) {
            $classe = Classe::find((int)$request->classe);
            $classe->teacher_id = $teacher->id;
            $classe->save();
            $teacher->classes()->attach($classe->id);

            $teacher->update($input);
            return redirect()->route('teachers.show', $teacher->id)->with('info', "Mise à jour réussie. Le maître $teacher->name garde désormais $classe->name")->with('type', 'info-success');
        }

        $teacher->update($input);
        return redirect()->route('teachers.show', $teacher->id)->with('info', "Mise à jour réussie. Les informations du maître $teacher->name ont bien été mises à jour")->with('type', 'info-success');
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
