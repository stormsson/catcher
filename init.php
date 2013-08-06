<?php

require_once 'vendor/autoload.php';
require_once './goutte.phar';

/* AUTOLOADING */
use Symfony\Component\ClassLoader\UniversalClassLoader;

$loader = new UniversalClassLoader();

// You can search the include_path as a last resort.
$loader->useIncludePath(true);



$loader->registerNamespaces(array(
    'Stormsson' => __DIR__.'/src',    
));

$loader->register();