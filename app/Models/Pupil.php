<?php

namespace App\Models;
use App\Helpers\TrashedGet;
use App\Models\Classe;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pupil extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'sexe', 'classe_id', 'birth', 'status', 'year','month', 'level', 'creator', 'editor', 'authorized'];

    public static function getBlockeds(string $level = null)
    {
        $blocked = (new TrashedGet(Pupil::class))->getDeleted($level);
        return $blocked;
    }


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

    public function isRespo()
    {
        $c = $this->classe;

        if ($c->respo1() !== null && $c->respo2() !== null) {
            if ($c->respo1()->id == $this->id) {
                return "text-primary";
            }
            elseif ($c->respo2()->id == $this->id) {
                return "text-success";
            }
            else{
                return "";
            }
        }
        else{
            if ($c->respo1() !== null && $c->respo2() == null) {
                if ($c->respo1()->id == $this->id) {
                    return "text-primary";
                }
                else{
                    return "";
                }
            }
            elseif($c->respo2() !== null && $c->respo1() == null){
                if ($c->respo2()->id == $this->id) {
                    return "text-primary";
                }
                else{
                    return "";
                }
            }
            else{
                return "";
            }

        }

    }

}
