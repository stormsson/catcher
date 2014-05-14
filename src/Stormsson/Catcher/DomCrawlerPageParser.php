<?php
namespace Stormsson\Catcher;

class DomCrawlerPageParser extends BasePageParser
{
  protected $_filters = array(
    'lista' => '.list_submenu li a',
    'titolo'=> 'h1.title_01'
  );

  public static function createInstance()
  {
    $instance = new self('http://symfony.com/doc/current/components/dom_crawler.html');
    return $instance;
  }

}