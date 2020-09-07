<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AdminErrorsController;
use App\Models\Admin;
use App\Models\Classe;
use App\Models\Teacher;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class AdminController extends Controller
{
    public const DEFAULT_PWD = 12345;

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
        // $teacher = Teacher::find(1);
        // $classesRufused = $teacher->classesConcernedByThisTeacherButNot();

        // dd($classesRufused);
        return view('admin.index');
    }

    /**
     * Create User
     * @param  [type] $data [description]
     * @return \App\User
     */
    public static function createUser($teacher, array $data, $role = 'user')
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
            'authorized' => $data['authorized'],
            'creator' => auth()->user()->name
        ]);
        
        return $user->teachers()->attach($teacher->id);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function setAdminToTeacherValidator(array $data, $level)
    {
        if ($level === "primary") {
            return Validator::make($data, [
                'name' => ['required', 'string', 'max:255', 'min:2', 'bail', 'unique:teachers'],
                'email' => ['required', 'string', 'email', 'max:255', 'bail', 'unique:teachers'],
                'contact' => ['required', 'string', 'min:7', 'bail'],
                'residence' => ['required', 'string', 'min:5', 'bail'],
                'classe' => ['numeric', 'bail'],
                'sexe' => ['required', 'string', 'bail'],
                'level' => ['required', 'string', 'bail'],
                'birth' => ['required', 'date', 'bail'],
                'month' => ['required', 'string', 'bail'],
                'year' => ['required', 'numeric', 'bail', 'max:'.date('year')]
            ]);
        }
        else if ($level === "secondary") {
            return Validator::make($data, [
                'name' => ['required', 'string', 'max:255', 'min:2', 'bail', 'unique:teachers'],
                'email' => ['required', 'string', 'email', 'max:255', 'bail', 'unique:teachers'],
                'contact' => ['required', 'string', 'min:7', 'bail'],
                'residence' => ['required', 'string', 'min:5', 'bail'],
                'sexe' => ['required', 'string', 'bail'],
                'level' => ['required', 'string', 'bail'],
                'birth' => ['required', 'date', 'bail'],
                'subject_id' => ['required', 'numeric', 'bail'],
                'month' => ['required', 'string', 'bail'],
                'year' => ['required', 'numeric', 'bail', 'max:'.date('year')]
            ]);
        }
        
  
    }


    public function setAdminTeacher(Request $request, $admin)
    {
        if (Gate::allows('gateIsAdmin')) {
            $level = $request->level;
            $request->creator = $request->name;
            $validator = $this->setAdminToTeacherValidator($request->all(), $level);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()]);
            }

            if ($level === 'primary') {
                $request->subject_id = null;
                $input = $request->except('classe');

                $teacher = Teacher::create($input);
                auth()->user()->update(['name' => $request->name, 'email' => $request->email, 'editor' => $request->name]);
                $teacher->users()->attach(auth()->user()->id);

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
                $input = $request->all();
                $teacher = Teacher::create($input);
                auth()->user()->update(['name' => $request->name, 'email' => $request->email, 'editor' => $request->name]);
                $teacher->users()->attach(auth()->user()->id);
                return response()->json(['success'=> 'Vous '.$teacher->name, 'level' => $level]);
            }

        }
        else{
            return response()->json(['errors403'=> 'Unauthorized for this page']);
        }
        
 
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validatorForDefaultUser(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);
    }


        /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createDefaultUser(Request $request)
    {
        $request->password = self::DEFAULT_PWD;

        $validator = $this->validatorForDefaultUser($request->all());

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'creator' => auth()->user()->name,
            'password' => Hash::make($request->password)
        ]);

        return response()->json(['success'=> $user]);
    }

    /**
     * [updateUser description]
     * @param  [type] $user_id [description]
     * @param  [type] $data    [description]
     * @return [type]          [description]
     */
    public static function updateUser($teacher, $user, $data)
    {
        $teacher->update($data->all());
        $user->update($data->only(['name', 'email']));
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
    public function edit($id)
    {
        //
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
}
