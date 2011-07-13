<?php
require_once 'DungeonGenerator.class.php';
require_once 'DrunkManStrategy.class.php';

/**
 * Testing the DrunkMan algorithm
 * 
 */
class DrunkManTest extends PHPUnit_Framework_TestCase {

	protected $drunkMan;
	protected $mapGen;
 
	protected function setUp(){
		$this->drunkMan = new DrunkManStrategy();
		$this->mapGen = new DungeonGenerator($this->drunkMan);
	}

	/**
	 * Provides some maps used to generate data to the tests.
	 * Not used as a phpUnit dataProvider.
	 *
     */
	public function getmaps(){
		//Some maps to test
		$map0=array(
		array("#","#","#","#"));

		$map1=array(
		array("#"),
		array("#"),
		array("#"),
		array("#"),
		array("#"));

		$map2=array(
		array("#","#"),
		array("#","#"));

		$map3=array(
		array("#","#","#","#","#"),
		array("#","#","#","#","#"),
		array("#","#","#","#","#"),
		array("#","#","#","#","#"),
		array("#","#","#","#","#"));

		$map4=array(
		array("#","#","#"),
		array("#","#","#"),
		array("#","#","#"),
		array("#","#","#"),
		array("#","#","#"));

		$map5=array(
		array("#","#","#","#","#"),
		array("#","#","#","#","#"),
		array("#","#","#","#","#"));

		return array($map0, $map1, $map2, $map3, $map4, $map5);
	}

	/**
	 * Provides data to the Start Point test
	 *
     */
	public function mapsProvider(){

		$maps=$this->getmaps();


		//Creating struture of a dataprovider return
		return array(
          array($maps[0]),
          array($maps[1]),
          array($maps[2]),
          array($maps[3]),
          array($maps[4]),
          array($maps[5])
        );

	}

	/**
	 * Provides data to the next point check test
	 *
     */
	public function nextPointProvider(){

		$maps=$this->getmaps();
	
		//Creating struture of a dataprovider return
		//Map, ActualLine, AcualColumn
		return array(
          array($maps[0], 0, 0),
		  array($maps[0], 0, 1),
		  array($maps[0], 0, 3),

          array($maps[1], 0, 0),
          array($maps[1], 1, 0),
          array($maps[1], 3, 0),

          array($maps[2], 0, 0),
          array($maps[2], 0, 1),
          array($maps[2], 1, 0),
          array($maps[2], 1, 1),

          array($maps[3], 0, 0),
          array($maps[3], 2, 2),
          array($maps[3], 4, 4),
          array($maps[3], rand(0,4), rand(0,4)), //A random test :P

          array($maps[4], 0, 0),
          array($maps[4], 2, 1),
          array($maps[4], 4, 2),
          array($maps[4], rand(0,4), rand(0,2)), //A random test :P

          array($maps[5], 0, 0),
          array($maps[5], 1, 2),
          array($maps[5], 2, 4),
          array($maps[5], rand(0,2), rand(0,4)) //A random test :P
        );

	}

	/**
	 * Provides data to the walk test
	 *
     */
	public function walkProvider(){

		$maps=$this->getmaps();


		//Creating struture of a dataprovider return
		//Map, Steps
		return array(
          array($maps[0], 1),
		  array($maps[0], 3),
		  array($maps[0], 10),

          array($maps[1], 1),
          array($maps[1], 3),
          array($maps[1], 10),

          array($maps[2], 1),
          array($maps[2], 3),
          array($maps[2], 10),

          array($maps[3], 1),
          array($maps[3], 10),
          array($maps[3], 30),
          array($maps[3], rand(1,30)), //A random test :P

          array($maps[4], 1),
          array($maps[4], 5),
          array($maps[4], 20),
          array($maps[4], rand(1,20)), //A random test :P

          array($maps[5], 1),
          array($maps[5], 5),
          array($maps[5], 20),
          array($maps[5], rand(0,20)) //A random test :P
        );

	}


	/**
	 * Testing if the start point is valid
	 * 
     * @dataProvider mapsProvider
     */
	public function testPickStartPoint($map){
		$this->assertEquals(array(0,0), $this->drunkMan->pickStartPoint($map));
	}

	/**
	 * Testing the next point generation algorithm
	 *
     * @dataProvider nextPointProvider
     */
	public function testPickNextPoint($myMap, $xPoint,$yPoint){
		$lines=sizeof($myMap);
		$columns=sizeof($myMap[0]);

		$next=$this->drunkMan->pickNextPoint($myMap, $xPoint,$yPoint);
		//verify line range
		$this->assertTrue($next[0]>=0);
		$this->assertTrue($next[0]<=$lines-1);

		//verify column range
		$this->assertTrue($next[1]>=0);
		$this->assertTrue($next[1]<=$columns-1);


		//Verify distance
		$this->assertTrue( abs($xPoint-$next[0]) <=1 ); //0 or 1
		$this->assertTrue( abs($yPoint-$next[1]) <=1 ); //0 or 1
		
		//No diagonal
		//Cannot change line AND column at the same time
		$this->assertTrue( abs($xPoint-$next[0]) + abs($yPoint-$next[1]) <=1 ); //0 or 1
	}

	/**
	 * For now, just printing some walked maps
	 *
     * @dataProvider walkProvider
     */
	public function testDrunkManWalk($myMap, $steps){
		$map=$this->mapGen->walk($myMap,$steps);

		//printMap($map);
	}

	/**
	 * Test to ensure that the whole map can be used
     * 
     */
	public function testCompleteDrunkWalk(){
		$maps=$this->getmaps();

		$walkMap=$this->mapGen->walk($maps[0],100);//enough to use all spaces (so statistics says)
		$checkMap=array(
		array("*","*","*","*"));
		$this->assertEquals($checkMap,$walkMap);

		$walkMap=$this->mapGen->walk($maps[1],100);//enough to use all spaces (so statistics says)
		$checkMap=array(
		array("*"),
		array("*"),
		array("*"),
		array("*"),
		array("*"));
		$this->assertEquals($checkMap,$walkMap);

		$walkMap=$this->mapGen->walk($maps[2],100);//enough to use all spaces (so statistics says)
		$checkMap=array(
		array("*","*"),
		array("*","*"));
		$this->assertEquals($checkMap,$walkMap);
	}
}
