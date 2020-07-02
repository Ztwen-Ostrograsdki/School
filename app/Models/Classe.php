<?php

namespace App\Models;

use App\Models\Pupil;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Classe extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'level', 'year', 'month', 'respo1', 'respo2', 'teacher_id'];

    /**
     * To get all pupils of this classe
     * @return [type] [description]
     */
    public function pupils()
    {
    	return $this->hasMany(Pupil::class);
    }


    /**
     * To get all subject of this classe
     * @return [type] [description]
     */
    public function subjects()
    {
    	return $this->morphedByMany(Subject::class, 'classable');
    }

    /**
     * To get all teachers of this classe
     * @return [type] [description]
     */
    public function teachers()
    {
    	return $this->morphedByMany(Teacher::class, 'classable');
    }

    /**
     * To get the principal
     * @return [type] [description]
     */
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }


    public function respo1()
    {
        return Pupil::find($this->respo1);
    }

    public function respo2()
    {
        return Pupil::find($this->respo2);
    }



    /**
     * To get the name of the teacher of a specific subject
     * @param  int    $subject [description]
     * @return [type]          [description]
     */
    public function teacherOf(int $subject)
    {
        $teachers = $this->teachers;
        if ($teachers->count() > 0) {
            
            foreach ($teachers as $teacher) {
                if ($teacher->subject->id == $subject) {
                    return $teacher;
                }
            }
        }

    }

}
