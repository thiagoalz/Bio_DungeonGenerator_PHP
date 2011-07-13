<?php
require_once 'WalkStrategy.class.php';
require_once 'GenericStrategy.class.php';

class DrunkManStrategy extends GenericStrategy implements WalkStrategy{

	protected function pickNextPoint($myMap, $linePoint,$columnPoint) {
		$linesSize=sizeof($myMap);
		$columnsSize=sizeof($myMap[0]);

		////
		//Maybe, if just radom from 0-4 to decide here to move could be simpler.
		////
	
		$minLine= ($linePoint-1) >= 0? -1 : 0; //If in the corner, Cannot walk to a negative position
		$maxLine= ($linePoint+1) < $linesSize ? 1 : 0; //If in the corner, Cannot walk to a out of bounds position
		$lineChange=rand($minLine,$maxLine); //secure rand(-1,1);

		$minColumn= ($columnPoint-1) >= 0? -1 : 0; //If in the corner, Cannot walk to a negative position
		$maxColumn= ($columnPoint+1) < $columnsSize? 1 : 0; //If in the corner, Cannot walk to a out of bounds position
		$columnChange=rand($minColumn,$maxColumn); //secure rand(-1,1);

		//Cannot walk diagonal.
		if ( (abs($lineChange) + abs($columnChange)) >1 ){//if both directions are changing
			//choose one to reset
			$reset=rand(0,1);
			if($reset==0){
				$lineChange=0;
			}else{
				$columnChange=0;
			}
		}

		return array($linePoint+$lineChange,$columnPoint+$columnChange);
	}

	public function walk($myMap ,$stepNumber, $startLine=0, $startColumn=0){
		$steps=0;
		while ($steps<$stepNumber){
			$myMap=$this->visit($myMap, $startLine,$startColumn);

			$steps++;
			$nextPoint=$this->pickNextPoint($myMap, $startLine,$startColumn);

			$startLine=$nextPoint[0];
			$startColumn=$nextPoint[1];
		}

		return $myMap;
	}
}
