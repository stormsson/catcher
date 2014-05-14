<?php
require_once 'vendor/autoload.php';

use Stormsson\Catcher\DomCrawlerPageParser;


$meh = new DomCrawlerPageParser('http://symfony.com/doc/current/components/dom_crawler.html');


$results = $meh->run()->getResults();

foreach ($results as $name => $nodes)
{
  echo "<h2>$name</h2>";
  foreach($nodes as $node)
  {
    echo $node->nodeValue." -> ". $node->getAttribute('href')."<br/>";
  }
}
