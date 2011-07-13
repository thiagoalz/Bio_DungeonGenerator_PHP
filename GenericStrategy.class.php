<?php
require_once 'WalkStrategy.class.php';

abstract class GenericStrategy implements WalkStrategy{	

	public function visit($myMap, $line,$column){
		$myMap[$line][$column]="*";

		return $myMap;
	}
}
