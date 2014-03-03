<?php
   /*Check alphabet */
   //define namespace
  namespace Runner\Validation;
  class ValidateAlphabet implements IValidator{
  
    private $inputData;
     
    public function __construct($inputData){
        $this->inputData =  $inputData;
     }
  
     public function validate(){
         if(!$this->inputData||!preg_match("/^[a-z A-Z]+$/",$this->inputData)){
             return array('msg' => 'contains characters other than alphabets');
         }
         return true;
     }   
   }
?>