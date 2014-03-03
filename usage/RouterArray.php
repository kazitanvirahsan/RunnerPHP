<?php

$routerArray = array(
   'Article' => array(   array( 'controller' => 'Article', 'action' => 'aboutme'),
   	                     array( 'controller' => 'Article', 'action' => 'showarticles'),
   	                     array( 'controller' => 'Article', 'action' => 'showarticle'),
   	                     array('controller'  => 'Article', 'action' => 'addcomment'),
   	                     array('controller'  => 'Article', 'action' => 'home'),
                         array('controller'  => 'Article', 'action' => 'search')
   	            )
	);

?>