<?php

namespace App\Models;

use App\Models\Classe;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pupil extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'sexe', 'classe_id', 'birth', 'status', 'year','month', 'level'];

    public function classe()
    {
    	return $this->belongsTo(Classe::class);
    }

    public function getSexe()
    {
    	if ($this->sexe == 'male') {
    		return 'Masculin';
    	}
    	else{
    		return 'Féminin';
    	}
    }

}
