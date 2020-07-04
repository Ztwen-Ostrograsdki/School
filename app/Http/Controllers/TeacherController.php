<?php

namespace App\Http\Controllers;

use App\Helpers\Tools\Tools;
use App\Http\Controllers\AdminController;
use App\Http\Requests\TeacherRequest;
use App\ModelHelper;
use App\Models\Classe;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TeacherController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *@var  param the level|subject_id 
     * @return \Illuminate\Http\Response
     */
    public function index($param = null)
    {
        if ($param === null) {
            $teachers = Teacher::all();
        }
        else{
            if (is_numeric($param)) {
                $param = (int)$param;
                $teachers = Teacher::where('subject_id', $param)->get();
            }
            elseif (is_string($param)) {
                $teachers = Teacher::whereLevel($param)->get();
            }
        }

        $table = $teachers->toArray();

        return view('admin.teachers.index', compact('teachers', 'param', 'table'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
    public function show(int $id)
    {
        $id = (int)$id;
        $teacher = Teacher::whereId($id)->firstOrFail();
        $t = (new ModelHelper($teacher))->setNameAndSurname();
        if ($teacher->level == 'secondary') {
            $teacher->subject->setSlug();
        }
        return view('admin.teachers.profil', compact('teacher', 'id', 't'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $t, string $ind = null)
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        
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


     

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }

    /**
     * Insert a teacher into users table after registration of a teacher
     * @param  [type] $request [description]
     * @return [type]          [description]
     */
    public static function insertIntoUser($request, $teacher)
    {
        $pwd = AdminController::DEFAULT_PWD;
        $t = Teacher::whereEmail($request->email)->firstOrFail();
        $data = [
            'name' => $t->name,
            'email' => $t->email,
            'password' => $pwd
        ];
        return AdminController::createUser($teacher, $data, 'teacher');
    }


    /**
     * Upadte a teacher into users table after update of a teacher
     * @param  [type] $request [description]
     * @return [type]          [description]
     */
    public static function updateTeacherUserInfo($teacher, $data)
    {
        $user = $teacher->user();
        AdminController::updateUser($teacher, $user, $data);
    }
}
