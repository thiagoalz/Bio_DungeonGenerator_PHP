<?php

interface WalkStrategy{
    function walk($myMap ,$stepNumber, $startLine=0, $startColumn=0);
}
