<?php
namespace Runner\Request;
use Runner\Request\Exception;
class RequestController{
  
  public $params = array();
  
  public function __construct(){
     $this->params = $_REQUEST;
  }
  
  public function obtainValue($key){
      // if value is empty then thorw an exception
      if(!isset($this->params[$key]) || !$this->params[$key]) throw new Exception\InvalidQueryRequest();  
      return $this->params[$key]; 
  
  }


public function clearValue($key){
      // if value is empty then thorw an exception
      if(isset($this->params[$key])) {  
        $this->params[$key] = ''; 
    }
}
  

  public function obtainGetRequest(){
     return $_GET;
  }


  public function obtainPostRequest(){
     return $_POST;
  }


  public function obtainPostValue($key){
     return $_POST[$key];
  }

  public function obtainGetValue($key){
      return $_GET[$key];
  }
  
}

?>