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

	public function walk($myMap ,$stepNumber){
		return $this->myWalkStrategy->walk($myMap ,$stepNumber);
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
