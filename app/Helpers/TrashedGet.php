<?php
namespace App\Helpers;


class TrashedGet{

	private $classMapping;

	public function __construct($classMapping)
	{
		$this->classMapping = $classMapping;

		$this->classMapping;
	}

	public function getDeleted(string $level = null , string $column = 'deleted_at')
	{
		$all = $this->classMapping::withTrashed($column)->get();
		$blocked = [];
		if ($level === null) {
			for ($i=0; $i < count($all) ; $i++) {
	            if($all[$i]->deleted_at !== null) {
	                $blocked[] = $all[$i];
	            }
	        }
		}
		else{
			if ($level == 'primary') {
				for ($i=0; $i < count($all) ; $i++) {
		            if($all[$i]->deleted_at !== null && $all[$i]->level === 'primary') {
		                $blocked[] = $all[$i];
		            }
		        }
				
			}
			elseif ($level == "secondary") {
				for ($i=0; $i < count($all) ; $i++) {
		            if($all[$i]->deleted_at !== null && $all[$i]->level === 'secondary') {
		                $blocked[] = $all[$i];
		            }
		        }
				
			}
		}
		

        return $blocked;
	}


	/**
	 * Use to get a total occurence in a table model
	 * @return int the total
	 */
	public function getCounter(string $column = 'deleted_at')
    {
        return $this->classMapping::withTrashed($column)->count();
    }


}