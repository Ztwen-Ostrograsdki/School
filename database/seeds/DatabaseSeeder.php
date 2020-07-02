<?php

use App\ClasseAndSubjectJoiner;
use App\Helpers\Seeders\Seeders;
use App\Models\Classe;
use App\Models\Pupil;
use App\Models\Subject;
use App\Models\Teacher;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
Use App\Helpers\Formattors\ZtwenFaker;
Use App\Helpers\Tools\Tools;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // factory(Teacher::class, 10)->create();

        // $teachers = Teacher::all();

        // foreach ($teachers as $teacher) {
        //     $user = User::create([
        //         'name' => $teacher->name,
        //         'email' => $teacher->email,
        //         'password' => Hash::make(12345),
        //         'role' => 'teacher'
        //     ]);
        //     $teacher->users()->attach($user->id);

        // }

        $subjects = Seeders::getSubjects();
            foreach ($subjects as $subject) {
            Subject::create($subject);
        }
        $ids = range(10, 24);
        factory(Teacher::class, 40)->create()->each(function ($teacher) use($ids) {   
            $teacher->subject_id = rand(10, 24);
            $teacher->save();
            $user = User::create([
                'name' => $teacher->name,
                'email' => $teacher->email,
                'password' => Hash::make(12345),
                'role' => 'teacher'
            ]);
            $teacher->users()->attach($user->id);  
        }); 

        $classes = Seeders::getClasses();
        foreach ($classes as $classe) {
            Classe::create($classe);
            $c = Classe::whereLevel('secondary')->latest('id')->get();
            if ($c->toArray() !== []) {
                $classe = $c[0];
                (New ClasseAndSubjectJoiner($classe))->joinedSubjectsNow($classe);
            }
        
        }
        
        factory(Pupil::class, 200)->create();
    }   
      
      	
}
