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

function pickStartPoint($myMap) {
	$lines=sizeof($myMap);
	$columns=sizeof($myMap[0]);

	
	//sortear um ponto de entrada
	//Tem que ser 0 ou max na linha ou na coluna

	return array(0,0);
}

function pickNextPoint($myMap, $xPoint,$yPoint) {
	$lines=sizeof($myMap);
	$columns=sizeof($myMap[0]);
	
	$minX= ($xPoint-1) > 0? ($xPoint-1) : 0;
	$maxX= ($xPoint+1) < ($lines-1)? ($xPoint+1) : ($lines-1);
	$xPoint=rand($minX,$maxX);

	$minY= ($yPoint-1) > 0? ($yPoint-1) : 0;
	$maxY= ($yPoint+1) < ($columns-1)? ($yPoint+1) : ($columns-1);
	$yPoint=rand($minY,$maxY);

	return array($xPoint,$yPoint);
}

function drunkMan($myMap ,$stepNumber){
	$startPoint=pickStartPoint($myMap);
	$xPoint=$startPoint[0];
	$yPoint=$startPoint[1];

	$steps=0;

	while ($steps<$stepNumber){
		$myMap=visit($myMap, $xPoint,$yPoint);

		$steps++;
		$nextPoint=pickNextPoint($myMap, $xPoint,$yPoint);

		$xPoint=$nextPoint[0];
		$yPoint=$nextPoint[1];
	}

	return $myMap;
}

function visit($myMap, $xPoint,$yPoint){
	$myMap[$xPoint][$yPoint]="*";

	return $myMap;
}

function printMap($map){
	echo "\n====================\n";
	foreach($map as $line){
		foreach($line as $item){
			echo($item);
		}
		echo("\n");
	}
}
