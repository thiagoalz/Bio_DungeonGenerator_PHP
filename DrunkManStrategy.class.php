<?php
require_once 'WalkStrategy.class.php';

class DrunkManStrategy implements WalkStrategy{

	public function pickStartPoint($myMap) {
		$lines=sizeof($myMap);
		$columns=sizeof($myMap[0]);

	
		//sortear um ponto de entrada
		//Tem que ser 0 ou max na linha ou na coluna

		return array(0,0);
	}

	public function pickNextPoint($myMap, $xPoint,$yPoint) {
		$lines=sizeof($myMap);
		$columns=sizeof($myMap[0]);

		//Maybe, if just radom from 0-4 to decide here to move could be simpler.	
		$minX= ($xPoint-1) >= 0? -1 : 0; //If in the corner, Cannot walk to a negative position
		$maxX= ($xPoint+1) < $lines ? 1 : 0; //If in the corner, Cannot walk to a out of bounds position
		$xChange=rand($minX,$maxX); //secure rand(-1,1);

		$minY= ($yPoint-1) >= 0? -1 : 0; //If in the corner, Cannot walk to a negative position
		$maxY= ($yPoint+1) < $columns? 1 : 0; //If in the corner, Cannot walk to a out of bounds position
		$yChange=rand($minY,$maxY); //secure rand(-1,1);

		//Cannot walk diagonal.
		if ( (abs($xChange) + abs($yChange)) >1 ){//if both directions are changing
			//choose one to reset
			$reset=rand(0,1);
			if($reset==0){
				$xChange=0;
			}else{
				$yChange=0;
			}
		}

		return array($xPoint+$xChange,$yPoint+$yChange);
	}

	public function walk($myMap ,$stepNumber){
		$startPoint=$this->pickStartPoint($myMap);
		$xPoint=$startPoint[0];
		$yPoint=$startPoint[1];

		$steps=0;

		while ($steps<$stepNumber){
			$myMap=$this->visit($myMap, $xPoint,$yPoint);

			$steps++;
			$nextPoint=$this->pickNextPoint($myMap, $xPoint,$yPoint);

			$xPoint=$nextPoint[0];
			$yPoint=$nextPoint[1];
		}

		return $myMap;
	}

	public function visit($myMap, $xPoint,$yPoint){
		$myMap[$xPoint][$yPoint]="*";

		return $myMap;
	}
}
