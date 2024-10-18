<?php
declare(strict_types = 1);

require_once('vendor/autoload.php');

use Bfg\Task\PinGenerator;


$obj = new PinGenerator; 
$pins = $obj->generate(5, 4); 

print_r($pins); 
