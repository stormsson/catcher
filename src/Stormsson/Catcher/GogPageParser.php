<?php
namespace Stormsson\Catcher;

class GogPageParser extends BasePageParser
{
  protected $_filters = array(    
    'titolo'=> '.game__title',
    'qty' => '.js-left-count'
  );

  public static function createInstance()
  {
    $instance = new self('http://www.gog.com/');
    return $instance;
  }

}