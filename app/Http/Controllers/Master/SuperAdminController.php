<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('onlySuperAdmin');
    }


    /**
     * To approve an inserting of a data 
     * @param  [type] $request [description]
     * @param  [type] $user    [description]
     * @return [type]          [description]
     */
    public static function getAuthorization($user)
    {
        if (in_array('superAdmin', $user->getRoles())) {
            return true;
        }
        return false;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('directors.index');
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

    /**
     * To update the data of the teacher and related user in database
     * @param  [type] $teacher [description]
     * @param  [type] $user    [description]
     * @param  [type] $data    [description]
     * @return [type]          [description]
     */
    public static function updateTeacherAndUser($teacher, $user, $data)
    {
        $teacher->update($data->all());
        // $user->update($data->only(['name', 'email', 'authorized']));
    }

}
