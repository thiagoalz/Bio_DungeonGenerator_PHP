<?php

abstract class MapTest extends PHPUnit_Framework_TestCase {

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

	protected function getUnaccessibleMethod($className, $methodName) {
	  $class = new ReflectionClass($className);
	  $method = $class->getMethod($methodName);
	  $method->setAccessible(true);
	  return $method;
	}
}
