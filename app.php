<?php

require_once __DIR__.'/vendor/autoload.php';

$app = new Silex\Application();

$app->get('/{numofprimes}', function ($numofprimes) use ($app) {
    $target = $numofprimes;
    $counter = 0;
    $num = 1;
    $retstring = "";
    while($counter < $target) {
        $num++;
        if(isPrime($num)) {
           $counter++;
           $retstring .= " $num";
        }
    }
    return $retstring;
});

$app->get('/', function() use ($app) {
  return "try /{number of primes to return}";
});

function isPrime($num) {
   if($num%2 == 0)
        return false;
   for($i = $num; $i>1; $i--) {
        if( ($num % $i == 0) && ($i != $num) ) {
           return false;
        }
   }
   return true;
}

$app->run();
