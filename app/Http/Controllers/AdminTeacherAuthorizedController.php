<?php

namespace App\Http\Controllers;

use App\ModelHelper;
use App\Models\Teacher;
use App\Policies\TeacherPolicy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AdminTeacherAuthorizedController extends Controller
{

    public function __construct()
    {

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
        $id = (int)$id;
        $teacher = Teacher::whereId($id)->firstOrFail();

        if (Gate::check('onlyThisTeacher', [$teacher])) {
            $t = (new ModelHelper($teacher))->setNameAndSurname();
            if ($teacher->level == 'secondary') {
                $teacher->subject->setSlug();
            }
            return view('admin.teachers.profil', compact('teacher', 'id', 't'));
        }
        abort(403, "Vous étes pas autorisé");


            
        
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
