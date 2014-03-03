<?php
    /*Check email address */
namespace Runner\Validation;
// use Ivalidator 
  class ValidateEmailAddress implements IValidator{
     private $inputData;
     
     public function __construct($inputData){
        $this->inputData =  $inputData;
     }
      
     public function validate(){
         if(!$this->inputData||!preg_match("/.+@.+..+./",$this->inputData)){
             return array('msg' =>'Not a valid email address');
         }
                
     return true; 
     } 
  }
?>