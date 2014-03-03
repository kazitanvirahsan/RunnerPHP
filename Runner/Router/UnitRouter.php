<?php

namespace Runner\Router;

class UnitRouter{

    /**
     * Array containing all routes.
     *
     * @var PriorityList
     */
    protected $routes;
    
    /**
    * @var : $route 
    */
    public function addRoute(array $route) {
      array_push($routes , $route);
    }


   /**
    * @var : $routes 
    */
    public function addRoutes(array $routes) {
        foreach($routes as $key=>$value){
            $this->routes[$key] = $value;
        }
    }

   /**
    * 
    * return @var : returns all routes 
    */
   public function showRoutes(){
     return $this->routes; 
   }

   /**
    * @param  array $Route
    * @return boolean $foundMatch 
    */
   public function findRoute(array $Route) {

        $controller = $Route['controller'];
        $action = $Route['action'];

        //Check if it matches with controller
        $matchController = array_key_exists($controller , $this->routes);        
        if(!$matchController) return $matchController; 

        // Get all actions associated with the controllers
        $actions = $this->routes[$controller];

        //Check if matches with actions
        foreach($actions as $key=>$value){
        
            $matchController = ( $value['action'] == $action);
            
            if($matchController) return  $matchController;       
        } 

        return $matchController; 
   }

	
   }

?>