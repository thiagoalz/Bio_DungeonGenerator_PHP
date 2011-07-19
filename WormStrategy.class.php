<?php
require_once 'WalkStrategy.class.php';
require_once 'GenericStrategy.class.php';

class WormStrategy extends GenericStrategy implements WalkStrategy{


	public function walk($myMap ,$stepNumber, $startLine=0, $startColumn=0){
		$steps=0;
		while ($steps<$stepNumber){
			$myMap=$this->visit($myMap, $startLine,$startColumn);

			$direcao = rand(0,3);

			$steps+=10; //TODO: Mudar numero fixo de passos por linha
			$nextPoint = $this->walkLine(&$myMap, 10 ,$startLine,$startColumn, $direcao);

			$startLine = $nextPoint[0];
			$startColumn = $nextPoint[1];
		}

		return $myMap;
	}


	protected function walkLine($myMap ,$stepNumber, $startLine, $startColumn, $direction){
		switch ($direction) {
			case 0:
			case "N":
				return $this->walkNorth(&$myMap ,$stepNumber, $startLine, $startColumn);
				break;
			case 1:
			case "S":
				return $this->walkSouth(&$myMap ,$stepNumber, $startLine, $startColumn);
				break;
			case 2:
			case "W":
				return $this->walkWest(&$myMap ,$stepNumber, $startLine, $startColumn);
				break;
			case 3:
			case "E":
				return $this->walkEast(&$myMap ,$stepNumber, $startLine, $startColumn);
				break;
		}
	}

	private function walkNorth($myMap ,$stepNumber, $startLine, $startColumn){
		$step=0;
		$myMap=$this->visit($myMap, $startLine,$startColumn);
		while ($step < $stepNumber && $startLine>0){
			$startLine--;
			$step++;
			$myMap=$this->visit($myMap, $startLine,$startColumn);
		}

		return array($startLine,$startColumn);
	}

	private function walkSouth($myMap ,$stepNumber, $startLine, $startColumn){
		$linesSize=sizeof($myMap);
		$step=0;
		$myMap=$this->visit($myMap, $startLine,$startColumn);
		while ($step < $stepNumber && $startLine < ($linesSize-1)){
			$startLine++;
			$step++;
			$myMap=$this->visit($myMap, $startLine,$startColumn);
		}
		return array($startLine,$startColumn);
	}

	private function walkWest($myMap ,$stepNumber, $startLine, $startColumn){
		$step=0;
		$myMap=$this->visit($myMap, $startLine,$startColumn);
		while ($step < $stepNumber && $startColumn>0){
			$startColumn--;
			$step++;
			$myMap=$this->visit($myMap, $startLine,$startColumn);
		}
		return array($startLine,$startColumn);
	}

	private function walkEast($myMap ,$stepNumber, $startLine, $startColumn){
		$columnsSize=sizeof($myMap[0]);
		$step=0;
		$myMap=$this->visit($myMap, $startLine,$startColumn);
		while ($step < $stepNumber && $startColumn < ($columnsSize -1)){
			$startColumn++;
			$step++;
			$myMap=$this->visit($myMap, $startLine,$startColumn);
		}
		return array($startLine,$startColumn);
	}

}
