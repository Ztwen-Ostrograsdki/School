<?php

namespace App\Helpers;

use Illuminate\Database\Eloquent\Collection;

class Paginattors{



	/**
	 * Use to manage the previous and he next button of pagination
	 * @param  Collection $collection [description]
	 * @param  int        $current    [description]
	 * @return array                 the value of previous and  next 
	 */
	public static function previousAndNext(Collection $collection, int $current, $keyPlucked = 'id')
	{
		if (isset($current)) {
			$IDs = $collection->pluck($keyPlucked)->toArray();

			$__IDs = array_flip($IDs); // transposée de IDs
			$minID = min($IDs);
			$maxID = max($IDs);

			$currentID = $IDs[$__IDs[$current]];
			if ($__IDs[$currentID] == 0) {
				$previous = 0;
			}
			elseif($__IDs[$currentID] > 0 && $__IDs[$currentID] <= max($__IDs)){
				$previous = $IDs[$__IDs[$currentID] - 1];
			}
			if ($__IDs[$currentID] == max($__IDs)) {
				$next = 0;
			}
			else{
				$next = $IDs[$__IDs[$currentID] + 1];
			}

			return [
			'previous' => $previous,
			'next' => $next
			];
		}
		else{
			return null;
		}
	}


}