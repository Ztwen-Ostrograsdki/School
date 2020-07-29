<?php

namespace App\Http\Controllers\Master;

use App\Helpers\Tools\Tools;
use App\Http\Controllers\Controller;
use App\Http\ValidatorsSpaces\PupilsValidators;
use App\ModelHelper;
use App\Models\Pupil;
use App\Models\Teacher;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PupilsController extends Controller
{
    use PupilsValidators;

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
        return view('directors.pupils.index');
    }


    /**
     * Use to send a data to a view in ajax
     * @return a json response 
     */
    public function pupilsDataSender($pupilEdited = null, array $errors = [])
    {
        $user = auth()->user();
        $admin = false;
        $roles = $user->getRoles();

        if (in_array('admin', $roles) || in_array('superAdmin', $roles)) {
            $admin = true;
        }
        $AllpupilsWithClasses = [];
        $PSBlockeds = [];
        $PPBlockeds = [];
        $pupils = Pupil::withTrashed('deleted_at')->orderBy('name', 'asc')->get();
        $u = User::all()->count();
        $t = Teacher::all()->count();
        $ts = Teacher::whereLevel('secondary')->count();
        $tp = Teacher::whereLevel('primary')->count();
        $PBSLength = count(Pupil::getBlockeds('secondary'));
        $PBPLength = count(Pupil::getBlockeds('primary'));
        $blockeds = Pupil::getBlockeds();

        foreach ($blockeds as $pb) {
           if ($pb->level == "secondary") {
               $PSBlockeds[] = $pb;
           }
           elseif ($pb->level == "primary") {
               $PPBlockeds[] = $pb;
           }
        }


        foreach (Pupil::withTrashed('deleted_at')->get() as $pupil) {
            $AllpupilsWithClasses[$pupil->id] = $pupil->classe->getFormattedClasseName();
        }

        $pupilsSecondary = Pupil::whereLevel('secondary')->orderBy('name', 'asc')->get();
        $pupilsPrimary = Pupil::whereLevel('primary')->orderBy('name', 'asc')->get();

        $data = [
            'user' => $user,
            'admin' => $admin,
            'p' => $pupils,
            'pSec' => $pupilsSecondary, 
            'pPrim' => $pupilsPrimary, 
            'all' => $AllpupilsWithClasses, 
            'u' => $u, 
            't' => $t, 
            'ts' => $ts, 
            'tp' => $tp, 
            'pblockeds' => $blockeds, 
            'PSBlockeds' => $PSBlockeds, 
            'PPBlockeds' => $PPBlockeds, 
            'PBSLength' => $PBSLength, 
            'PBPLength' => $PBPLength
        ];
        if ($errors !== []) {
            $data['errors'] = $errors;
        }
        else{
            $data['errors'] = ['status' => false, 'type' => ''];
        }
        if ($pupilEdited !== null) {
            $classeFMT = $pupilEdited->classe->getFormattedClasseName();
            $birthday = ModelHelper::birthFormattor($pupilEdited, 0);

            $helper = new ModelHelper($pupilEdited);
            $surname = $helper->setLastNameAndFirstName();

            $lastName = $helper->getLastName();
            $firstName = $helper->getFirstName();
            
            $data['pupilEdited'] = $pupilEdited; 
            $data['classeFMT'] = $classeFMT; 
            $data['birthFMT'] = $birthday; 
            $data['firstName'] = $firstName; 
            $data['lastName'] = $lastName; 
        }
        return response()->json($data);
    }

    /**
     * Use to get a data of a pupil
     * @param  int    $id [description]
     * @return a json response to a view
     */
    public function getAPupilData(int $id)
    {
        $token = csrf_token();
        $p = Pupil::withTrashed('deleted_at')->whereId($id)->firstOrFail();

        $classeFMT = $p->classe->getFormattedClasseName();
        $birthday = ModelHelper::birthFormattor($p, 0);

        $helper = new ModelHelper($p);
        $surname = $helper->setLastNameAndFirstName();

        $lastName = $helper->getLastName();
        $firstName = $helper->getFirstName();

        $classeName = $p->classe->name;

        return response()->json(['p' => $p, 'token' => $token, 'classeFMT' => $classeFMT, 'birthFMT' => $birthday, 'classeName' => $classeName, 'firstName' => $firstName, 'lastName' => $lastName]);
    }


    /**
     * Use to get a classe formatted of a pupil
     * @param  int    $id [description]
     * @return a json response to a view 
     */
    public function pupilClasse(int $id)
    {
        $p = Pupil::find((int)$id);
        $classe = $p->classe->getFormattedClasseName();
        return response()->json($classe);
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
        if ((!$request->filled('token') || $request->token == "") || ($request->filled('token') && $request->token !== csrf_token())) {
            return $this->pupilsDataSender(null, ['status' => true, 'type' => '419']);
        }

        $validator = $this->pupilsPersoValidator($request->all());

        if ($validator->fails()) {
            return response()->json(['invalidInputs' => $validator->errors()]);
        }

        $pupil = Pupil::create($request->all());
        if ($pupil) {
            $creator = auth()->user();
            $pupil->creator = $creator->name;

            if (in_array('admin', $creator->getRoles()) || in_array('superAdmin', $creator->getRoles())) {
                $pupil->authorized = true;
            }
            $pupil->save();
        }


        
        return $this->pupilsDataSender();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('directors.pupils.profil');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
       
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function persoUpdate(Request $request, int $id)
    {

        if ((!$request->filled('token') || $request->token == "") || ($request->filled('token') && $request->token !== csrf_token())) {
            return $this->pupilsDataSender(null, ['status' => true, 'type' => '419']);
        }

        $pupil = Pupil::withTrashed('deleted_at')->whereId((int)$id)->firstOrFail();

        $validator = $this->pupilsPersoValidator($request->all(), $id);

        if ($validator->fails()) {
            return response()->json(['invalidInputs' => $validator->errors()]);
        }

        if ($pupil->update($request->all())) {
            $updater = auth()->user();
            $pupil->editor = $updater->name;
            

            if (in_array('admin', $updater->getRoles()) || in_array('superAdmin', $updater->getRoles())) {
                $pupil->authorized = true;
            }
            $pupil->save();
        }

        return $this->pupilsDataSender($pupil, []);

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $pupil = Pupil::find((int)$id);
        if ($pupil->delete()) {
            return $this->pupilsDataSender();
        }

    }

    public function restore(int $id) 
    {   
        Pupil::withTrashed()->whereId((int)$id)->firstOrFail()->restore();
        return $this->pupilsDataSender();
    }

    

}
