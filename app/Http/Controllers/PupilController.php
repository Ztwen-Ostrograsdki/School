<?php

namespace App\Http\Controllers;

use App\ModelHelper;
use App\Models\Classe;
use App\Models\Pupil;
use Illuminate\Http\Request;
use App\Http\Requests\PupilsRequest;

class PupilController extends Controller
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
    public function index($param = null)
    {
        if ($param === null) {
            $pupils = Pupil::oldest('name')->get();
        }
        else{
            if (is_numeric($param)) {
                //Then the param is a class
                $param = (int)$param;
                $pupils = Classe::find($param)->pupils()->oldest('name')->get();
                
            }
            elseif (is_string($param)) {
                // Then the param is a level
                $pupils = Pupil::whereLevel($param)->oldest('name')->get();
            }
        }
        
        $table = $pupils->toArray();
        return view('admin.pupils.index', compact('pupils', 'param', 'table'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pupils.edits.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PupilsRequest $request)
    {

        // $data = $request->all();
        // $check = true;
        // // $check = Pupil::create($data);
        // $arr = array('msg' => 'Something goes to wrong. Please try again lator', 'status' => false);
        // if($check){ 
        //     $arr = array('msg' => 'Successfully submit form using ajax', 'status' => true);
        // }
        // return Response()->json($arr);
        // dd($data);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $pupil = Pupil::find($id);
        $p = (new ModelHelper($pupil))->setNameAndSurname();
        return view('admin.pupils.profil', compact('pupil', 'p'));
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
