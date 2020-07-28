<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\Formattors\Formattors;

class ModelHelper extends Model
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

     /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $name
     *
     * @return self
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->surname;
    }

    /**
     * @param mixed $surname
     *
     * @return self
     */
    public function setLastName($surname)
    {
        $this->surname = $surname;

        return $this;
    }
    public static function birthFormattor(Model $model, $limit = 3)
    {
    	$date = $model->birth;
    	$parts = array_reverse(explode('-', $date));
    	$day = $parts[0];
    	$m = (int)$parts[1];
    	$year = $parts[2];

        if ($limit == 0) {
            $month = Formattors::monthOfADate($m - 1);
        }
        else{
            $month = strlen(Formattors::monthOfADate($m - 1)) > 4 ? mb_substr(Formattors::monthOfADate($m - 1), 0, 3) : Formattors::monthOfADate($m - 1);
        }

    	return $day . ' '. $month . ' ' . $year;
    }



    public function setLastNameAndFirstName()
    {
        $defaultName = $this->model->name;
        if ($defaultName == ""  || $defaultName == null || empty($defaultName)){
            return [];
        }
        else{
            $each = explode(' ', $defaultName);

            $firstName = strtoupper($each[0]);
            if (count($each) > 1) {
               $tabSurname = [];
                for ($i = 1; $i < count($each); $i++) { 
                    $tabSurname[] = $each[$i];
                }
                $surname =  ucwords(implode(' ', $tabSurname));
            }
            else{
                $surname = "";
            }

            return $this->setLastName($firstName)->setFirstName($surname);
        }
    }


    /**
	 * Return the month of the given index
	 * @param  int    $index numeric index the the month
	 * @return string      the month
	 */
	public static function monthOfADate(int $index){
	
        $months = [
            "Janvier",
            "Février",
            "Mars",
            "Avril",
            "Mai",
            "Juin",
            "Juillet",
            "Août",
            "Septembre",
            "Octobre",
            "novembre",
            "Décembre"

        ];
        return $months[$index];
    }


    public function finder($index)
    {
        $tags = [];
        foreach ($this->model->pupils as $p) {
            if ($p->sexe == $index) {
               $tags[] = $p;
            }
        }
        return $tags;
    }

   
}
