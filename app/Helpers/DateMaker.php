<?php


namespace App\Helpers;

class DateMaker{

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





}