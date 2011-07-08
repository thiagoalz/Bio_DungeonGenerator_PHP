<?php
$map=createMap(10,10);
$map=drunkMan($map,10);

printMap($map);

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
}

function drunkMan($myMap ,$stepNumber){
	$xPoint=0;
	$yPoint=0;

	$steps=0;

	while ($steps<$stepNumber){
		$myMap=visit($xPoint,$yPoint, $myMap);

		$steps++;
		//ExcolheproximoPonto
	}

	return $myMap;
}

function visit($xPoint,$yPoint, $myMap){
	$myMap[$xPoint][$yPoint]=".";

	return $myMap;
}

function printMap($map){
	foreach($map as $line){
		foreach($line as $item){
			echo($item);
		}
		echo("<BR>");
	}
}

