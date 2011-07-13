<HTML>
<body>
<pre>
<?php

require_once 'DungeonGenerator.class.php';
require_once 'DrunkManStrategy.class.php';

$mapGen = new DungeonGenerator(new DrunkManStrategy());
$map = $mapGen->createMap(30,30);
$map=$mapGen->walk($map,500);
$mapGen->printMap($map);
?>
</pre>
</body>
</HTML>
