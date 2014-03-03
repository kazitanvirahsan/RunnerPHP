RunnerPHP is a small and handy phpmvc framework 
===============================
 
Usage and sample codes:

Router White Listing Sample Code:
RUNNER Ref: https://github.com/kazitanvirahsan/RunnerPHP/blob/master/Runner/Router/UnitRouter.php

$routerArray = array(
   'Article' => array( array( 'controller' => 'Article', 'action' => 'aboutme'),
    array( 'controller' => 'Article', 'action' => 'showarticles'),
    array( 'controller' => 'Article', 'action' => 'showarticle'),
    array('controller' => 'Article', 'action' => 'addcomment'),
    array('controller' => 'Article', 'action' => 'home'),
    array('controller' => 'Article', 'action' => 'search')
    )
);


    // create Unit Routing
    $unitRoute = new Router\UnitRouter();
    $unitRoute->addRoutes($routerArray);

    // your controller and action collected from URL
    $route = array( "controller" => $controller, "action" => $action);
    
    // check your controller and action against your predefined router 
    $whiteListCheck = $unitRoute->findRoute( $route );

   //Enter into the main application after validation
   if($whiteListCheck) {
      // enter into application
   }else {
      // forward to erro page
   }




Form Validation Usage:
RUNNER Ref: https://github.com/kazitanvirahsan/RunnerPHP/tree/master/Runner/Validation

        // create an instance of validation context 
        $validation_context = new classes_validation_ValidatorContext();
        
        // obtain email address
        $email = $this->request->obtainValue('email');
        
        // add a validator to this email address
        $validation_context->addValidator(new classes_validation_ValidateEmailAddress($email));
        
        // obtain name 
        $name = $this->request->obtainValue('name');
        
        // add a validator to this name
        $validation_context->addValidator(new classes_validation_ValidateAlphabet($name));
        
        // validate everything that have been added to far
        $validation_context->validate();
        
        // get error message array
        $validation_error_msgs = $validation_context->getErrorMsgs();
        
        // check if there is any error message
        if($validation_error_msgs){
           // save your form
        }



Prebuilt HTML Cache usage:
RUNNER Ref: https://github.com/kazitanvirahsan/RunnerPHP/blob/master/Runner/Cache/PrebuiltHTMLCache.php
            
            //create an instance of PrebuiltHTMLCache class                
            $htmlcache_obj = new Cache\PrebuiltHTMLCache();

            // your actual html file    
            $srcFile = $this->viewPath . '/Template/sidebar.htm';

            // your prebuilt html file
            $destFile = $this->viewPath . '/Template/sidebar_cache.htm';            

            // if it is too old then regenerate it from old one
            $htmlcache_obj->doPrebuiltHTML(
                      $srcFile,
                      $destFile,
                      $data);


                              RunnerPHP is an open source project initiated and developed By Kazi Tanvir Ahsan. 

