<?php

namespace Stormsson\Catcher;


use Symfony\Component\Config\FileLocator;
use Symfony\Component\Routing\Loader\YamlFileLoader;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Router;

use Stormsson\Catcher\ParserNotFoundException;

class Project
{


  protected $_router ;
  protected $_basedir;

  public function __construct($basedir)
  {
    $this->_basedir = $basedir;
    $this->initRouting();
  }

  protected function getLocator()
  {
      return new FileLocator(array($this->_basedir ."/config/"));
  }

  protected function initRouting()
  {
    $locator = $this->getLocator();
    $requestContext = new RequestContext($_SERVER['REQUEST_URI']);
    

    $this->_router = new Router(
        new YamlFileLoader($locator),
        'routes.yml',
        array(), // cachedir
        $requestContext
    );    

    //$this->_router->match('/catcher/bar');
  }
  
  public function getRouter()
  {
    return $this->_router;
  }
  
  public function dispatch($controller)
  {
    @$result = call_user_func(__NAMESPACE__.'\\'.$controller.'::createInstance');
    
   if( null === $result)
   {
     throw new ParserNotFoundException("controller '$controller' non trovato");
   }

   return $result->run()->getResults();
   
  }
}