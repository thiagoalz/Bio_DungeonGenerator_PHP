<?php
require_once 'DungeonGenerator.class.php';
require_once 'WormStrategy.class.php';
require_once 'MapTest.php';

/**
 * Testing the DrunkMan algorithm
 * 
 */
class WormTest extends MapTest {

	protected $worm;
	protected $mapGen;
 
	protected function setUp(){
		$this->worm = new WormStrategy();
		$this->mapGen = new DungeonGenerator($this->worm);
	}

	public function testWalkNorth(){
		//invoking protected method
		$pickNextPointMethod = $this->getUnaccessibleMethod("WormStrategy", "walkNorth");
		$next=$pickNextPointMethod->invokeArgs($this->drunkMan, array($myMap, $xPoint,$yPoint));
		
		$this->assertEquals("Test it","");
	}

	public function testWalkShouth(){
		//invoking protected method
		$pickNextPointMethod = $this->getUnaccessibleMethod("WormStrategy", "walkSouth");
		$next=$pickNextPointMethod->invokeArgs($this->drunkMan, array($myMap, $xPoint,$yPoint));

		$this->assertEquals("Test it","");
	}

	public function testWalkWest(){
		//invoking protected method
		$pickNextPointMethod = $this->getUnaccessibleMethod("WormStrategy", "walkWest");
		$next=$pickNextPointMethod->invokeArgs($this->drunkMan, array($myMap, $xPoint,$yPoint));

		$this->assertEquals("Test it","");
	}

	public function testWalkEast(){
		//invoking protected method
		$pickNextPointMethod = $this->getUnaccessibleMethod("WormStrategy", "walkWeast");
		$next=$pickNextPointMethod->invokeArgs($this->drunkMan, array($myMap, $xPoint,$yPoint));

		$this->assertEquals("Test it","");
	}

	/**
	 * For now, just printing some walked maps
	 *
     * @dataProvider walkProvider
     */
	public function testWormWalk($myMap, $steps){
		$map=$this->mapGen->walk($myMap,$steps);

		//TODO: Check arrays sizes
	}
}
