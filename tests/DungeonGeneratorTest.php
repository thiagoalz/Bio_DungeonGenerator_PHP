<?php
require_once 'DungeonGenerator.class.php';
require_once 'MapTest.php';

/**
 * Testing generation of clean maps
 * 
 */
class MapCriationTest extends MapTest {

	protected $mapGen;
 
	protected function setUp(){
		$this->mapGen = new DungeonGenerator();
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

	public function testSimpleMapCreation(){
		$map=$this->mapGen->createMap(0,0);	
		$this->assertEmpty($map);

		$map=$this->mapGen->createMap(1,1);	
		$this->assertEquals(array(array("#")),$map);
	}
	
	public function testLineMapCreation(){
		$maps=$this->getmaps();
		$myMap=$maps[0]; //1x4

		$generatedMap=$this->mapGen->createMap(1,4);
		$this->assertEquals($myMap,$generatedMap);
	}

	public function testColumnMapCreation(){
		$maps=$this->getmaps();
		$myMap=$maps[1]; //5x1

		$generatedMap=$this->mapGen->createMap(5,1);
		$this->assertEquals($myMap,$generatedMap);
	}

	public function testSquareMapCreation(){
		$maps=$this->getmaps(); //2x2

		$myMap=$maps[2];
		$generatedMap=$this->mapGen->createMap(2,2);
		$this->assertEquals($myMap,$generatedMap);

		$myMap=$maps[3]; //5x5
		$generatedMap=$this->mapGen->createMap(5,5);
		$this->assertEquals($myMap,$generatedMap);
	}

	public function testRectangleMapCreation(){
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
		$linesSize=sizeof($map);
		$columnsSize=sizeof($map[0]);

		$point = $this->mapGen->pickStartPoint($map);
		$this->assertTrue($point[0] >= 0 && $point[0] < $linesSize);
		$this->assertTrue($point[1] >= 0 && $point[1] < $columnsSize);
	}
}
