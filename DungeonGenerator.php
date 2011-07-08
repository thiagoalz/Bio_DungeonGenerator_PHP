<?php

function createMap($lines,$columns){
	$myMap=null;

	for($i=0; $i<$lines; $i++){
		for($y=0; $y<$columns; $y++){
			$myMap[$i][$y]="#";
		}
	}
	return $myMap;
}
