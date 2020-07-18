<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Master\SuperAdminController;
use App\ModelHelper;
use App\Models\Classe;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeachersController extends Controller
{

    public function __construct()
    {
        $this->middleware('onlySuperAdmin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $teachers = Teacher::all();
        $secondaryTeachers = Teacher::whereLevel('secondary')->get();
        $primaryTeachers = Teacher::whereLevel('primary')->get();
        return view('directors.teachers.index', compact('teachers', 'primaryTeachers', 'secondaryTeachers'));

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
     * Store a new teacher if withuser === true store also user with the same data of the related teacher.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createTeacher(Request $request, $withUser = false)
    {
        $level = $request->level;
        $request->creator = auth()->user()->name;
        $validator = $this->teachersValidator($request->all(), $level);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => 12345,
            'role' => $request->role,
            'authorized' => $request->authorized
            ];

        if ($level === 'primary') {
            $request->subject_id = null;
            $input = $request->except(['classe', 'role']);

            $teacher = Teacher::create($input);
            
            if ($withUser) {
                AdminController::createUser($teacher, $data);
            }

            if ($request->filled('classe')) {
                $classe = Classe::find((int)$request->classe);
                $classe->teacher_id = $teacher->id;
                $classe->save();
                $teacher->classes()->attach($classe->id);
                return response()->json(['success'=> 'Vous '.$teacher->name, 'classe' => $classe->name, 'level' => $level]);
            }
            return response()->json(['success'=> 'Vous '.$teacher->name, 'level' => $level]);
        }
        elseif ($level === 'secondary') {
            $input = $request->except('role');
            $teacher = Teacher::create($input);
            
            if ($withUser) {
                AdminController::createUser($teacher, $data);
            }
            return response()->json(['success'=> 'Vous '.$teacher->name, 'level' => $level]);
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $withUser = false)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $id = (int)$id;
        $teacher = Teacher::whereId($id)->firstOrFail();
        $t = (new ModelHelper($teacher))->setNameAndSurname();
        if ($teacher->level == 'secondary') {
            $teacher->subject->setSlug();
        }
        return view('directors.teachers.profil', compact('teacher', 'id', 't'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $teacher = Teacher::find((int)$id);
        if ($teacher->level === "primary") {
            if ($teacher->classes->count() > 0) {
                $classe = $teacher->classes[0]->id;
            }
            else{
                $classe = null;
            }
        }
        else{
            $classe = null;
        }

        $role = $teacher->user()->role;
        return response()->json(['teacher'=> $teacher, 'role' => $role, 'classe' => $classe]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePersonalTeacherData(Request $request, int $id, $withuser = true)
    {
        $id = $request->teacher_id;
        $teacher = Teacher::find((int)$id);
        $level = $teacher->level;

        $validator = $this->teachersValidator($request->all(), $level, $id);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        if ($level === 'primary') {
            $request->subject_id = null;
            $input = $request->except(['classe', 'id']);

            if ($request->filled('classe')) {
                $classe = Classe::find((int)$request->classe);
                $classe->teacher_id = $teacher->id;
                $classe->save();
                $teacher->classes()->attach($classe->id);
            }

            $teacher->update($input);
            ($teacher->user())->update($request->only(['name', 'email', 'authorized', 'editor', 'role']));
            $teacher = Teacher::find($id);
            return response()->json(['success'=> $teacher]);
        }

        elseif ($level === "secondary") {
            $input = $request->except(['id', 'classe']);
            $teacher->update($input);
            ($teacher->user())->update($request->only(['name', 'email', 'authorized', 'editor', 'role']));

            $teacher = Teacher::find($id);
            $subject = $teacher->subject->name;
            return response()->json(['success'=> $teacher, 'subject' => $subject]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

    /**
     * Detach teacher to a specific classe
     * @param  int $teacher 
     * @param  int    $classe  
     * @return [type]          
     */
    public function detachTeacherAndClasse(int $teacher, int $classe = null)
    {
        $teacher = Teacher::find((int)$teacher);

        if ($classe !== null) {
            $classe = Classe::find((int)$classe);
            $teacher->classes()->detach($classe->id);
            return back()->with('info', "Mise à jour réussie. Le prof $teacher->name ne garde plus $classe->name")->with('type', 'info-success');
        }
        elseif ($classe == null) {
            $classes = $teacher->classes;
            foreach ($classes as $classe) {

                $teacherIsPrincipal = $teacher->classe;
                if ($teacherIsPrincipal !== null) {
                    $classe->teacher_id = null;
                    $classe->save();
                }
                $teacher->classes()->detach($classe->id);
            }
            return back()->with('info', "Rafraichissement réussi. Le prof $teacher->name ne garde plus de classes")->with('type', 'info-success');
        }
        
    }

        
  
    
}
