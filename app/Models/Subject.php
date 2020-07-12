<?php

namespace App\Models;

use App\Models\Classe;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
    protected $slug;

    use SoftDeletes;

    protected $fillable = ['name', 'level', 'year','month', 'ae_id', 'creator', 'editor', 'authorized'];

    /**
     * @return mixed
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param mixed $slug
     *
     * @return self
     */
    public function setSlug()
    {
        if ($this->name === 'Physique-Chimie-Technologie') {
            $this->slug = 'PCT';
        }
        elseif ($this->name === 'Histoire-Géographie') {
            $this->slug = 'Hist-Géo';
        }
        else{
            $this->slug = $this->name;
        }

        return $this;
    }


    public function teachers()
    {
    	return $this->belongsToMany(Teacher::class);
    }

    public function classes()
    {
    	return $this->morphToMany(Classe::class, 'classable');
    }

    public function code()
    {
        return mb_substr($this->name, 0, 4);
    }

    

    
   
}
