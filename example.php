<?php
use Stormsson\Catcher\DomCrawlerParser;

$meh = new DomCrawlerParser('http://symfony.com/doc/current/components/dom_crawler.html');


$results = $meh->run()->getResults();

foreach ($results as $name => $nodes)
{
  echo "<h2>$name</h2>";
  foreach($nodes as $node)
  {
    echo $node->nodeValue." -> ". $node->getAttribute('href')."<br/>";
  }
}
