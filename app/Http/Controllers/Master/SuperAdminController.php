<?php

namespace App\Http\Controllers\Master;

use App\Helpers\Tools\Tools;
use App\Http\Controllers\Controller;
use App\Models\Classe;
use App\Models\Pupil;
use App\Models\Subject;
use App\Models\Teacher;
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

    public function dataSender()
    {

        $user = auth()->user();
        $admin = false;
        $roles = $user->getRoles();

        if (in_array('admin', $roles) || in_array('superAdmin', $roles)) {
            $admin = true;
        }

        $u = User::all()->count();

        $t = Teacher::all()->count();
        $ts = Teacher::whereLevel('secondary')->count();
        $tp = Teacher::whereLevel('primary')->count();

        $p = Pupil::all()->count();
        $ps = Pupil::whereLevel('secondary')->count();
        $pp = Pupil::whereLevel('primary')->count();
        $pupilsBlockedsLength = count(Pupil::getBlockeds());
        $PBSLength = count(Pupil::getBlockeds('secondary'));
        $PBPLength = count(Pupil::getBlockeds('primary'));

        $data = [
            'user' => $user,
            'admin' => $admin,
            'tl' => $t, 
            'tsl' => $ts, 
            'tpl' => $tp, 
            'pl' => $p, 
            'psl' => $ps, 
            'ppl' => $pp, 
            'ul' => $u, 
            'pupilsblockedLength' => $pupilsBlockedsLength, 
            'PBSLength' => $PBSLength, 
            'PBPLength' => $PBPLength
        ];

        return response()->json($data);
    }

    /**
     * Use to get data and sebd then to a vue
     * @return a json response
     */
    public function getTOOLS()
    {   
        $secondarySubjects = Subject::whereLevel('secondary')->get();
        $primarySubjects = Subject::whereLevel('primary')->get();
        $primaryClasses = Classe::whereLevel('primary')->get();
        $secondaryClasses = Classe::whereLevel('secondary')->get();
        $months = Tools::months();
        $roles = Tools::roles();
        $data = [
            'secondaryClasses' => $secondaryClasses, 
            'primaryClasses' => $primaryClasses, 
            'primarySubjects' => $primarySubjects, 
            'secondarySubjects' => $secondarySubjects,
            'months' => $months,
            'roles' => $roles
        ];

        return response()->json($data);
        
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
