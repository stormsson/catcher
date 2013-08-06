<?php

// https://github.com/symfony/BrowserKit/blob/master/Client.php
// http://php.net/manual/en/class.domelement.php


ini_set('display_errors',1);
error_reporting(E_ALL);

require_once 'init.php';

/* init */

use Stormsson\Catcher\Project;
use Stormsson\Catcher\ParserNotFoundException;



$project = new Project(__DIR__);
$params = null;
try
{
  $params = $project->getRouter()->match($_SERVER['REQUEST_URI']);

}
catch (Symfony\Component\Routing\Exception\ResourceNotFoundException $e)
{
  die("404");
}
//var_dump($params);

$results = null;

try
{
  $results = $project->dispatch($params['_controller']);  
}
catch(ParserNotFoundException $e)
{
  echo $e->getMessage();
  die();
}

foreach ($results as $name => $nodes)
{
  echo "<h2>$name</h2>";
  foreach($nodes as $node)
  {
    echo $node->nodeValue." -> ". $node->getAttribute('href')."<br/>";
  }
}

/* parsing */
//require_once('example.php');

?>

ok