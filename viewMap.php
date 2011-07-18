<HTML>
<body>
<pre>
<?php

require_once 'DungeonGenerator.class.php';
require_once 'DrunkManStrategy.class.php';
require_once 'WormStrategy.class.php';

echo "====================\nDrunkMan";

$mapGen = new DungeonGenerator(new DrunkManStrategy());
$map = $mapGen->createMap(30,30);
$map=$mapGen->walk($map,500);
$mapGen->printMap($map);


echo "\n\n====================\nWorm";

$mapGen = new DungeonGenerator(new WormStrategy());
$map = $mapGen->createMap(30,30);
$map=$mapGen->walk($map,500);
$mapGen->printMap($map);
?>
</pre>
</body>
</HTML>
