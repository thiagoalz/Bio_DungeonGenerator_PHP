<?php

interface WalkStrategy{
	public function walk($myMap ,$stepNumber, $startLine=0, $startColumn=0);
}
