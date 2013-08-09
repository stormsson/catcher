<?php

namespace Stormsson\Catcher;
use Symfony\Component\Yaml\Parser;
use Symfony\Component\Yaml\Exception\ParseException;

class DomCrawlerPageParser extends BasePageParser
{
  public static function createInstance()
  {
    try {    
        $yaml = new Parser();
        $params = $yaml->parse(file_get_contents("config/parameters.yml")); 
    } catch (ParseException $e) {
        printf("Impossibile analizzare la stringa YAML: %s", $e->getMessage());
    }

    if(isset($params['filters'])) {
      $filters = $params['filters'];
    } 
    
    if(isset($params['url'])) {
      $url = $params['url'];
    }
    
    $instance = new self($url);
    $instance->setFilters($filters);
    
    
    return $instance;
  }  
  
}