<?php

namespace App\Http\Controllers;

use App\Helpers\Tools\Tools;
use App\Http\Controllers\TeacherController;
use App\Http\Requests\SecondaryTeachersRequest;
use App\Http\Requests\TeachersRequest;
use App\Models\Classe;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherOfSecondaryController extends Controller
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
        $level = 'secondary';
        $levelName = 'Secondaire';
        $subjects = Subject::whereLevel($level)->get();
        $levels = Tools::levels();
        $months = Tools::months();

        return view('admin.teachers.edits.create', compact('level', 'subjects', 'levels', 'months', 'levelName'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeachersRequest $request)
    {
        $input = $request->all();
        Teacher::create($input);

        $teacher = Teacher::all()->last();

        TeacherController::insertIntoUser($request, $teacher);


        return redirect()->route('teachers.show', $teacher->id)->with('info', "Insertion réussie. Les informations du prof $teacher->name ont bien été insérées dans les données de l'école")->with('type', 'info-success');
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
    public function edit(int $t, string $ind = null)
    {

        $teacher = Teacher::find($t);
        $months = Tools::months();
        $levels = Tools::levels();

        $classes = [];
        foreach (Classe::whereLevel('secondary')->get() as $secondaryClasse) {
            $classeSubjects = [];
            foreach ($secondaryClasse->subjects as $classeSub) {
                $classeSubjects[] = $classeSub->id;
            }
            if (in_array($teacher->subject->id, $classeSubjects)) {
                $classes[] = $secondaryClasse;
            }
        }

        if ($ind !== null) {
            if ($ind == 'personal') {
                $subjects = Subject::whereLevel('secondary')->get();
                return view('admin.teachers.edits.personal', compact('teacher', 'months', 'levels', 'subjects' ));

            }
            if ($ind == 'classe') {

                $teacherClassesId = [];
                $teacherClasses = $teacher->classes;

                if ($teacherClasses->count() > 0) {
                    foreach ($teacherClasses as $teacherClasse) {
                        $teacherClassesId[] = (int)$teacherClasse->id;
                    }
                    $c1 = (int)$teacherClassesId[0];
                    $c2 = $teacherClassesId[1] ?? null ;
                    $c3 = $teacherClassesId[2] ?? null ;
                    $c4 = $teacherClassesId[3] ?? null ;
                    $c5 = $teacherClassesId[4] ?? null ;
                }
                else{

                    $c1 = null;
                    $c2 = null;
                    $c3 = null;
                    $c4 = null;
                    $c5 = null;
                }
               $canHaveAgain = (int)$teacher->classes->count();
                return view('admin.teachers.edits.classeManage', compact('teacher', 'classes', 'c1', 'c2', 'c3', 'c4', 'c5', 'canHaveAgain'));
            }
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SecondaryTeachersRequest $request, $id)
    {
        $teacher = Teacher::find((int)$id);
        $input = $request->all();

        TeacherController::updateTeacherUserInfo($teacher, $request);

        return redirect()->route('teachers.show', $teacher->id)->with('info', "Mise à jour réussie. Les informations du prof $teacher->name ont bien été mises à jour")->with('type', 'info-success');
    }

    public function updateTeacherClasses(Request $request, int $t)
    {
        $teacher = Teacher::find($t);
        $classesShouldBeConfirmed = [];
        $classesAccepted = [];

        $teacherClasses = [];//On reccupère les classes du prof

        foreach ((Teacher::find($t))->classes as $tc) {
            $teacherClasses[] = $tc->id;
        }
        $cs = [];
        $c1 = $request->c1;
        $c2 = $request->c2;
        $c3 = $request->c3;
        $c4 = $request->c4;
        $c5 = $request->c5;
        if ($c1 !== "" && $c1 !== null) {
            $cs[] = $c1;
        }
        if ($c2 !== "" && $c2 !== null) {
            $cs[] = $c2;
        }
        if ($c3 !== "" && $c3 !== null) {
            $cs[] = $c3;
        }
        if ($c4 !== "" && $c4 !== null) {
            $cs[] = $c4;
        }
        if ($c5 !== "" && $c5 !== null) {
            $cs[] = $c5;
        }

        if ($cs == []) {
            return back()->with('info', "Vous n'avez choisir aucune classe")->with('type', 'danger'); 
        }
        else{
            $csTrans = array_flip($cs);

            if (count($csTrans) > 0) {
                $reqClasses = array_flip($csTrans);

                foreach ($reqClasses as $reqClasse) {
                    $reqClasse = (int)$reqClasse;

                    if (in_array($reqClasse, $teacherClasses)) {
                        //Le prof enseigne déjà dans cette classe alors on ne fait rien
                    }
                    else{
                        $cTeachersSubs = [];
                        $classeOldTeachers = (Classe::find($reqClasse))->teachers;//On reccupère les ancienns prof de la classe
                        
                        if ($classeOldTeachers->count() > 0) {
                            foreach ($classeOldTeachers as $classeOldTeacher) {
                                $cTeachersSubs[] = $classeOldTeacher->subject->id;// les matièes des différents profs trouves
                                if (!in_array($teacher->subject->id, $cTeachersSubs)) {
                                    // La classe admet de prof mais pas enore dans cette matière alors on ajoute le prof
                                    $classesAccepted[] = (int)$reqClasse;
                                }
                                else{
                                    // Il ya déjà un ancien prof qui enseigne cette matière 
                                    // on lance alors une procedure de confirmation une view de confirmation pour ces classes
                                    $classesShouldBeConfirmed[] = (int)$reqClasse;
                                    
                                }
                            }
                        }
                        else{
                            //La classe n'a pas encore de prof alors on relie le prof à la classe
                            //code ...
                            $classesAccepted[] = (int)$reqClasse;
                        }

                    }
                }
            }
            
        }
        if ($classesShouldBeConfirmed == [] && $classesAccepted ==[]) {
            return redirect()->route('teachers.show', $teacher->id)->with('info', "Votre requête était ambigüe alors nous avons conservé les anciennes classes de ce prof!")->with('type', 'info-info');
        }
        else{
            if ($classesAccepted !== []) {
                foreach ($classesAccepted as $classeAccepted) {
                    $teacher->classes()->attach($classeAccepted);
                }
                $classesAcceptedName = [];
                foreach ($classesAccepted as $classeAccepted) {
                    $classesAcceptedName[] = Classe::find($classeAccepted)->name;
                }
                $classesSuccesfully = 'la '.implode(' ,la ', $classesAcceptedName);

                if ($classesShouldBeConfirmed == []) {
                    return redirect()->route('teachers.show', $teacher->id)->with('info', "Mise à jour réussie. Le prof $teacher->name garde désormais $classesSuccesfully")->with('type', 'info-success');
                }
                else{
                    $classes = [];
                    foreach ($classesShouldBeConfirmed as $classeShouldBeConfirmed) {
                        $classes[] = (Classe::find($classeShouldBeConfirmed));
                    }
                    return view('admin.teachers.confirms.confirmedClasseAttach', compact('teacher', 'classes'))->with('info', "Mise à jour réussie. Le prof $teacher->name garde désormais $classesSuccesfully. Mais certaines classes sont déjà gardées par d'autres professeurs.")->with('type', 'info-success');
                }
            }
            else{
                if ($classesShouldBeConfirmed !== []) {
                    $classes = [];
                    foreach ($classesShouldBeConfirmed as $classeShouldBeConfirmed) {
                        $classes[] = (Classe::find($classeShouldBeConfirmed));
                    }
                    return view('admin.teachers.confirms.confirmedClasseAttach', compact('teacher', 'classes'))->with('info', "Mise à jour en cours. Les classes sélectionnées sont déjà gardées par d'autres professeurs.")->with('type', 'info-info');
                }
            }

        }
    }


    public function confirmClasses(Request $request, int $teacher)
    {
        $newTeacher = Teacher::find((int)$teacher);
        $total = (int)$request->total;
        $classesConfirmed = [];

        $c1 = $request->c1;
        $c2 = $request->c2;
        $c3 = $request->c3;
        $c4 = $request->c4;
        $c5 = $request->c5;

        if ($c1 !== null && strpos($c1, 'yes') !== false) {
            $classesConfirmed[] = $c1;
        }
        if ($c2 !== null && strpos($c2, 'yes') !== false) {
            $classesConfirmed[] = $c2;
        }
        if ($c3 !== null && strpos($c3, 'yes') !== false) {
            $classesConfirmed[] = $c3;
        }
        if ($c4 !== null && strpos($c4, 'yes') !== false) {
            $classesConfirmed[] = $c4;
        }
        if ($c5 !== null && strpos($c5, 'yes') !== false) {
            $classesConfirmed[] = $c5;
        }

        if ($classesConfirmed !== []) {
            foreach ($classesConfirmed as $classeConfirmed) {
                $classe = (int)explode('-', $classeConfirmed)[1];
                $oldTeacher = Teacher::find((int)explode('-', $classeConfirmed)[2]);
                $oldTeacherIsPrincipal = $oldTeacher->classe;

                if ($oldTeacherIsPrincipal !== null) {
                    $c = (Classe::find($classe));
                    $c->teacher_id = null;
                    $c->save();
                }
                $oldTeacher->classes()->detach($classe);

                $newTeacher->classes()->attach($classe);
            }
            return redirect()->route('teachers.show', $newTeacher->id)->with('info', "Opération réussie: Votre requête a bien été confirmée.")->with('type', 'info-success');
        }
        else{
            return redirect()->route('teachers.show', $newTeacher->id)->with('info', "Opération réussie:  La confiramtion d'octroi de classes à été annulée.")->with('type', 'info-info');
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
        //
    }
}
