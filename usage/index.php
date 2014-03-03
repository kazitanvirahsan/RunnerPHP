<?php

use Runner\Router;
use Runner\Mvc\Controller;
use Runner\Config;

include_once('ConfigArray.php');
include_once('RouterArray.php');

//spl_autoload_extensions('.class.php'); // To make sure spl only includes php-files while autoloading.
spl_autoload_register('loadClasses');

// Give Runner my ConfigArray
Config\AppConfig::ConfigFactory($configArray);

function loadClasses($className){
  //echo Config\AppConfig::get('SiteRoot');
  $path = str_replace('\\', DIRECTORY_SEPARATOR, $className);
  $file = $path . '.php';
    if (is_file($file)) {
        require_once($file);
    }
}


$unitRoute = new Router\UnitRouter();
$unitRoute->addRoutes($routerArray);

//The page is the first element
if(isset($_GET['controller']) && isset($_GET['action'])){
$controller= ucfirst($_GET['controller']);
$action = $_GET['action'];
}else{

  $controller= ucfirst('article');
  $action = 'showarticles';
}

$route = array( "controller" => $controller, "action" => $action);
$whiteListCheck = $unitRoute->findRoute(  $route   );

if($whiteListCheck) {
   $class = 'Runner\\Mvc\\Controller\\' . $route['controller'] . '_Controller';	
   $obj = new $class;
   $obj->$action();
   return;
}

