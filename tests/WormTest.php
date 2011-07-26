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
        $this->worm = new WormStrategy(5);
        $this->mapGen = new DungeonGenerator($this->worm);
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

    //TODO: Refatorar testes... organizar direito e criar funcao para executar essa comparação que se repete!
    public function testWalkNorth(){
        $maps=$this->getmaps();            

        //Walk 1 from 0x0
        $map=$maps[3]; //5x5 map
        $walkNorthMethod = $this->getUnaccessibleMethod("WormStrategy", "walkNorth");
        $next=$walkNorthMethod->invokeArgs($this->worm, array(&$map, 1, 0,0));

        $compareMap= array(
        array("*","#","#","#","#"),
        array("#","#","#","#","#"),
        array("#","#","#","#","#"),
        array("#","#","#","#","#"),
        array("#","#","#","#","#"));
        $this->assertEquals(array(0,0),$next);//Next point
        $this->assertEquals($compareMap,$map);//Final Map


        //Walk 5 from 0x0
        $map=$maps[3]; //5x5 map
        $walkNorthMethod = $this->getUnaccessibleMethod("WormStrategy", "walkNorth");
        $next=$walkNorthMethod->invokeArgs($this->worm, array(&$map, 5, 0,0));

        $compareMap= array(
        array("*","#","#","#","#"),
        array("#","#","#","#","#"),
        array("#","#","#","#","#"),
        array("#","#","#","#","#"),
        array("#","#","#","#","#"));
        $this->assertEquals(array(0,0),$next);//Next point
        $this->assertEquals($compareMap,$map);//Final Map


        //Walk 2 from 4x2
        $map=$maps[3]; //5x5 map
        $walkNorthMethod = $this->getUnaccessibleMethod("WormStrategy", "walkNorth");
        $next=$walkNorthMethod->invokeArgs($this->worm, array(&$map, 2, 4,2));

        $compareMap= array(
        array("#","#","#","#","#"),
        array("#","#","#","#","#"),
        array("#","#","*","#","#"),
        array("#","#","*","#","#"),
        array("#","#","*","#","#"));
        $this->assertEquals(array(2,2),$next);//Next point
        $this->assertEquals($compareMap,$map);//Final Map


        //Walk 5 from 4x2
        $map=$maps[3]; //5x5 map
        $walkNorthMethod = $this->getUnaccessibleMethod("WormStrategy", "walkNorth");
        $next=$walkNorthMethod->invokeArgs($this->worm, array(&$map, 5, 4,2));

        $compareMap= array(
        array("#","#","*","#","#"),
        array("#","#","*","#","#"),
        array("#","#","*","#","#"),
        array("#","#","*","#","#"),
        array("#","#","*","#","#"));
        $this->assertEquals(array(0,2),$next);//Next point
        $this->assertEquals($compareMap,$map);//Final Map


        //Walk 10 from 4x2
        $map=$maps[3]; //5x5 map
        $walkNorthMethod = $this->getUnaccessibleMethod("WormStrategy", "walkNorth");
        $next=$walkNorthMethod->invokeArgs($this->worm, array(&$map, 10, 4,2));

        $compareMap= array(
        array("#","#","*","#","#"),
        array("#","#","*","#","#"),
        array("#","#","*","#","#"),
        array("#","#","*","#","#"),
        array("#","#","*","#","#"));
        $this->assertEquals(array(0,2),$next);//Next point
        $this->assertEquals($compareMap,$map);//Final Map
    }

    public function testWalkSouth(){
        $maps=$this->getmaps();            

        //Walk 1 from 4x0
        $map=$maps[3]; //5x5 map
        $walkNorthMethod = $this->getUnaccessibleMethod("WormStrategy", "walkSouth");
        $next=$walkNorthMethod->invokeArgs($this->worm, array(&$map, 1, 4,0));

        $compareMap= array(
        array("#","#","#","#","#"),
        array("#","#","#","#","#"),
        array("#","#","#","#","#"),
        array("#","#","#","#","#"),
        array("*","#","#","#","#"));
        $this->assertEquals(array(4,0),$next);//Next point
        $this->assertEquals($compareMap,$map);//Final Map


        //Walk 5 from 4x0
        $map=$maps[3]; //5x5 map
        $walkNorthMethod = $this->getUnaccessibleMethod("WormStrategy", "walkSouth");
        $next=$walkNorthMethod->invokeArgs($this->worm, array(&$map, 5, 4,0));

        $compareMap= array(
        array("#","#","#","#","#"),
        array("#","#","#","#","#"),
        array("#","#","#","#","#"),
        array("#","#","#","#","#"),
        array("*","#","#","#","#"));
        $this->assertEquals(array(4,0),$next);//Next point
        $this->assertEquals($compareMap,$map);//Final Map


        //Walk 2 from 0x2
        $map=$maps[3]; //5x5 map
        $walkNorthMethod = $this->getUnaccessibleMethod("WormStrategy", "walkSouth");
        $next=$walkNorthMethod->invokeArgs($this->worm, array(&$map, 2, 0,2));

        $compareMap= array(
        array("#","#","*","#","#"),
        array("#","#","*","#","#"),
        array("#","#","*","#","#"),
        array("#","#","#","#","#"),
        array("#","#","#","#","#"));
        $this->assertEquals(array(2,2),$next);//Next point
        $this->assertEquals($compareMap,$map);//Final Map


        //Walk 5 from 0x2
        $map=$maps[3]; //5x5 map
        $walkNorthMethod = $this->getUnaccessibleMethod("WormStrategy", "walkSouth");
        $next=$walkNorthMethod->invokeArgs($this->worm, array(&$map, 5, 0,2));

        $compareMap= array(
        array("#","#","*","#","#"),
        array("#","#","*","#","#"),
        array("#","#","*","#","#"),
        array("#","#","*","#","#"),
        array("#","#","*","#","#"));
        $this->assertEquals(array(4,2),$next);//Next point
        $this->assertEquals($compareMap,$map);//Final Map


        //Walk 10 from 0x2
        $map=$maps[3]; //5x5 map
        $walkNorthMethod = $this->getUnaccessibleMethod("WormStrategy", "walkSouth");
        $next=$walkNorthMethod->invokeArgs($this->worm, array(&$map, 10, 0,2));

        $compareMap= array(
        array("#","#","*","#","#"),
        array("#","#","*","#","#"),
        array("#","#","*","#","#"),
        array("#","#","*","#","#"),
        array("#","#","*","#","#"));
        $this->assertEquals(array(4,2),$next);//Next point
        $this->assertEquals($compareMap,$map);//Final Map
    }

    public function testWalkWest(){
        $maps=$this->getmaps();            

        //Walk 1 from 0x0
        $map=$maps[3]; //5x5 map
        $walkNorthMethod = $this->getUnaccessibleMethod("WormStrategy", "walkWest");
        $next=$walkNorthMethod->invokeArgs($this->worm, array(&$map, 1, 0,0));

        $compareMap= array(
        array("*","#","#","#","#"),
        array("#","#","#","#","#"),
        array("#","#","#","#","#"),
        array("#","#","#","#","#"),
        array("#","#","#","#","#"));
        $this->assertEquals(array(0,0),$next);//Next point
        $this->assertEquals($compareMap,$map);//Final Map


        //Walk 5 from 0x0
        $map=$maps[3]; //5x5 map
        $walkNorthMethod = $this->getUnaccessibleMethod("WormStrategy", "walkWest");
        $next=$walkNorthMethod->invokeArgs($this->worm, array(&$map, 5, 0,0));

        $compareMap= array(
        array("*","#","#","#","#"),
        array("#","#","#","#","#"),
        array("#","#","#","#","#"),
        array("#","#","#","#","#"),
        array("#","#","#","#","#"));
        $this->assertEquals(array(0,0),$next);//Next point
        $this->assertEquals($compareMap,$map);//Final Map


        //Walk 2 from 2x4
        $map=$maps[3]; //5x5 map
        $walkNorthMethod = $this->getUnaccessibleMethod("WormStrategy", "walkWest");
        $next=$walkNorthMethod->invokeArgs($this->worm, array(&$map, 2, 2,4));

        $compareMap= array(
        array("#","#","#","#","#"),
        array("#","#","#","#","#"),
        array("#","#","*","*","*"),
        array("#","#","#","#","#"),
        array("#","#","#","#","#"));
        $this->assertEquals(array(2,2),$next);//Next point
        $this->assertEquals($compareMap,$map);//Final Map


        //Walk 5 from 2x4
        $map=$maps[3]; //5x5 map
        $walkNorthMethod = $this->getUnaccessibleMethod("WormStrategy", "walkWest");
        $next=$walkNorthMethod->invokeArgs($this->worm, array(&$map, 5, 2,4));

        $compareMap= array(
        array("#","#","#","#","#"),
        array("#","#","#","#","#"),
        array("*","*","*","*","*"),
        array("#","#","#","#","#"),
        array("#","#","#","#","#"));
        $this->assertEquals(array(2,0),$next);//Next point
        $this->assertEquals($compareMap,$map);//Final Map


        //Walk 10 from 2x4
        $map=$maps[3]; //5x5 map
        $walkNorthMethod = $this->getUnaccessibleMethod("WormStrategy", "walkWest");
        $next=$walkNorthMethod->invokeArgs($this->worm, array(&$map, 10, 2,4));

        $compareMap= array(
        array("#","#","#","#","#"),
        array("#","#","#","#","#"),
        array("*","*","*","*","*"),
        array("#","#","#","#","#"),
        array("#","#","#","#","#"));
        $this->assertEquals(array(2,0),$next);//Next point
        $this->assertEquals($compareMap,$map);//Final Map    
    }

    public function testWalkEast(){
        $maps=$this->getmaps();            

        //Walk 1 from 0x4
        $map=$maps[3]; //5x5 map
        $walkNorthMethod = $this->getUnaccessibleMethod("WormStrategy", "walkEast");
        $next=$walkNorthMethod->invokeArgs($this->worm, array(&$map, 1, 0,4));

        $compareMap= array(
        array("#","#","#","#","*"),
        array("#","#","#","#","#"),
        array("#","#","#","#","#"),
        array("#","#","#","#","#"),
        array("#","#","#","#","#"));
        $this->assertEquals(array(0,4),$next);//Next point
        $this->assertEquals($compareMap,$map);//Final Map


        //Walk 5 from 0x4
        $map=$maps[3]; //5x5 map
        $walkNorthMethod = $this->getUnaccessibleMethod("WormStrategy", "walkEast");
        $next=$walkNorthMethod->invokeArgs($this->worm, array(&$map, 5, 0,4));

        $compareMap= array(
        array("#","#","#","#","*"),
        array("#","#","#","#","#"),
        array("#","#","#","#","#"),
        array("#","#","#","#","#"),
        array("#","#","#","#","#"));
        $this->assertEquals(array(0,4),$next);//Next point
        $this->assertEquals($compareMap,$map);//Final Map


        //Walk 2 from 2x0
        $map=$maps[3]; //5x5 map
        $walkNorthMethod = $this->getUnaccessibleMethod("WormStrategy", "walkEast");
        $next=$walkNorthMethod->invokeArgs($this->worm, array(&$map, 2, 2,0));

        $compareMap= array(
        array("#","#","#","#","#"),
        array("#","#","#","#","#"),
        array("*","*","*","#","#"),
        array("#","#","#","#","#"),
        array("#","#","#","#","#"));
        $this->assertEquals(array(2,2),$next);//Next point
        $this->assertEquals($compareMap,$map);//Final Map


        //Walk 5 from 2x0
        $map=$maps[3]; //5x5 map
        $walkNorthMethod = $this->getUnaccessibleMethod("WormStrategy", "walkEast");
        $next=$walkNorthMethod->invokeArgs($this->worm, array(&$map, 5, 2,0));

        $compareMap= array(
        array("#","#","#","#","#"),
        array("#","#","#","#","#"),
        array("*","*","*","*","*"),
        array("#","#","#","#","#"),
        array("#","#","#","#","#"));
        $this->assertEquals(array(2,4),$next);//Next point
        $this->assertEquals($compareMap,$map);//Final Map


        //Walk 10 from 2x0
        $map=$maps[3]; //5x5 map
        $walkNorthMethod = $this->getUnaccessibleMethod("WormStrategy", "walkEast");
        $next=$walkNorthMethod->invokeArgs($this->worm, array(&$map, 10, 2,0));

        $compareMap= array(
        array("#","#","#","#","#"),
        array("#","#","#","#","#"),
        array("*","*","*","*","*"),
        array("#","#","#","#","#"),
        array("#","#","#","#","#"));
        $this->assertEquals(array(2,4),$next);//Next point
        $this->assertEquals($compareMap,$map);//Final Map
    }

    /**
     * For now, just running it
     *
     * @dataProvider walkProvider
     */
    public function testWormWalk($myMap, $steps){
        $map=$this->mapGen->walk($myMap,$steps);

        //$this->mapGen->printMap($map);
    }
}
