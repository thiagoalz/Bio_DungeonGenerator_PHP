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

	public function testSimpleMap(){
		$map=$this->mapGen->createMap(0,0);	
		$this->assertEmpty($map);

		$map=$this->mapGen->createMap(1,1);	
		$this->assertEquals(array(array("#")),$map);
	}
	
	public function testLineMap(){
		$myMap=array(
		array("#","#","#","#"));
		$generatedMap=$this->mapGen->createMap(1,4);
		$this->assertEquals($myMap,$generatedMap);
	}

	public function testColumnMap(){
		$myMap=array(
		array("#"),
		array("#"),
		array("#"),
		array("#"),
		array("#"));
		$generatedMap=$this->mapGen->createMap(5,1);
		$this->assertEquals($myMap,$generatedMap);
	}

	public function testSquareMap(){
		$myMap=array(
		array("#","#"),
		array("#","#"));
		$generatedMap=$this->mapGen->createMap(2,2);
		$this->assertEquals($myMap,$generatedMap);

		$myMap=array(
		array("#","#","#","#","#"),
		array("#","#","#","#","#"),
		array("#","#","#","#","#"),
		array("#","#","#","#","#"),
		array("#","#","#","#","#"));
		$generatedMap=$this->mapGen->createMap(5,5);
		$this->assertEquals($myMap,$generatedMap);
	}

	public function testRectangleMap(){
		$myMap=array(
		array("#","#","#"),
		array("#","#","#"),
		array("#","#","#"),
		array("#","#","#"),
		array("#","#","#"));
		$generatedMap=$this->mapGen->createMap(5,3);
		$this->assertEquals($myMap,$generatedMap);

		$myMap=array(
		array("#","#","#","#","#"),
		array("#","#","#","#","#"),
		array("#","#","#","#","#"));
		$generatedMap=$this->mapGen->createMap(3,5);
		$this->assertEquals($myMap,$generatedMap);
	}
}
