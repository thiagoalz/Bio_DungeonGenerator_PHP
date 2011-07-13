<?php

class DungeonGenerator{

	private $myWalkStrategy;

	function __construct($walkStrategy=null){
		if ($walkStrategy==null){
			$walkStrategy=new DrunkManStrategy();
		}

		$this->myWalkStrategy=$walkStrategy;
	}

	public function createMap($lines,$columns){
		$myMap=null;

		for($i=0; $i<$lines; $i++){
			for($y=0; $y<$columns; $y++){
				$myMap[$i][$y]="#";
			}
		}
		return $myMap;
	}

	public function pickStartPoint($myMap) {
		$lines=sizeof($myMap);
		$columns=sizeof($myMap[0]);

	
		//sortear um ponto de entrada
		//Tem que ser 0 ou max na linha ou na coluna

		return array(0,0);
	}

	public function walk($myMap ,$stepNumber){
		$startPoint= $this->pickStartPoint($myMap);
		return $this->myWalkStrategy->walk($myMap ,$stepNumber, $startPoint[0], $startPoint[1]);
	}

	public function printMap($map){
		echo "\n====================\n";
		foreach($map as $line){
			foreach($line as $item){
				echo($item);
			}
			echo("\n");
		}
	}
}
