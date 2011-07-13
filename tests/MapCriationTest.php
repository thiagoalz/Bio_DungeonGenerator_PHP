<?php
require_once 'DungeonGenerator.class.php';

/**
 * Testing generation of clean maps
 * 
 */
class MapCriationTest extends PHPUnit_Framework_TestCase {

	protected $mapGen;
 
	protected function setUp(){
		$this->mapGen = new DungeonGenerator();
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
          array($maps[0]), //1x4
          array($maps[1]), //5x1
          array($maps[2]), //2x2
          array($maps[3]), //5x5
          array($maps[4]), //5x3
          array($maps[5])  //3x5
        );

	}

	public function testSimpleMap(){
		$map=$this->mapGen->createMap(0,0);	
		$this->assertEmpty($map);

		$map=$this->mapGen->createMap(1,1);	
		$this->assertEquals(array(array("#")),$map);
	}
	
	public function testLineMap(){
		$maps=$this->getmaps();
		$myMap=$maps[0]; //1x4

		$generatedMap=$this->mapGen->createMap(1,4);
		$this->assertEquals($myMap,$generatedMap);
	}

	public function testColumnMap(){
		$maps=$this->getmaps();
		$myMap=$maps[1]; //5x1

		$generatedMap=$this->mapGen->createMap(5,1);
		$this->assertEquals($myMap,$generatedMap);
	}

	public function testSquareMap(){
		$maps=$this->getmaps(); //2x2

		$myMap=$maps[2];
		$generatedMap=$this->mapGen->createMap(2,2);
		$this->assertEquals($myMap,$generatedMap);

		$myMap=$maps[3]; //5x5
		$generatedMap=$this->mapGen->createMap(5,5);
		$this->assertEquals($myMap,$generatedMap);
	}

	public function testRectangleMap(){
		$maps=$this->getmaps();
		$myMap=$maps[4]; //5x3

		$generatedMap=$this->mapGen->createMap(5,3);
		$this->assertEquals($myMap,$generatedMap);

		$myMap=$maps[5]; //3x5
		$generatedMap=$this->mapGen->createMap(3,5);
		$this->assertEquals($myMap,$generatedMap);
	}

	/**
	 * Testing if the start point is valid
	 * 
     * @dataProvider mapsProvider
     */
	public function testPickStartPoint($map){
		$this->assertEquals(array(0,0), $this->mapGen->pickStartPoint($map));
	}
}
