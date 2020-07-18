<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Pupil;
use Illuminate\Http\Request;

class PupilsController extends Controller
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
        return view('directors.pupils.index');
    }


    /**
     * Use to send a data to a view in ajax
     * @return a json response 
     */
    public function pupilsDataSender()
    {
        $allDATA = [];
        $pupils = Pupil::all();

        foreach ($pupils as $pupil) {
            $allDATA[$pupil->id] = $pupil->classe->getFormattedClasseName();
        }
        $pupilsSecondary = Pupil::whereLevel('secondary')->get();
        $pupilsPrimary = Pupil::whereLevel('primary')->get();
        return response()->json(['p' => $pupils, 'pSec' => $pupilsSecondary, 'pPrim' => $pupilsPrimary, 'all' => $allDATA]);
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
    public function destroy(int $id)
    {
        $pupil = Pupil::find((int)$id);
        if ($pupil->delete()) {
            return $this->pupilsDataSender();
        }

    }
}
