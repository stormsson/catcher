<?php

namespace Stormsson\Catcher;

use Goutte\Client;

class BasePageParser implements \IteratorAggregate
{
  protected $_crawler = null;
  protected $_filters = array();

  protected $_client =  null,
            $_url = null,
            $_method = null;


  public function getIterator()
  {
    return $this->_crawler;
  }

  public function run()
  {
    
    return $this;
  }


  public function getResults()
  {
    
    $results = array();
    foreach ($this->_filters as $name => $regexp)
    {
      $results[$name] = $this->_crawler->filter($regexp);      
    }
    return $results;
  }


  public function __construct($url,$method = "GET")
  {
    $this->_method = $method;
    $this->_url = $url;
    
    $this->_client = new Client();
    $this->_crawler = $this->_client->request($method,$url);
    
    
  }

  public function getFilters()
  {
    return $this->_filters;
  }

  public function addFilter($name,$regexp)
  {
    
    $this->_filters[$name] = $regexp;    
  }

  public function getCrawler()
  {
    return $this->_crawler;
  }

}