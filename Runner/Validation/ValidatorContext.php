<?php
namespace Runner\Validation;
// a reference to a Strategy object 
class ValidatorContext { 
    private $validators = array();
    private $v_error_msgs= array();
   
    public function addValidator(IValidator $validator){
        //echo 'ok';
        //exit();
        $this->validators[] = $validator;    
    }
    
    public function validate() {
      foreach($this->validators as $v){
         if(is_array($v->validate())){
             $this->v_error_msgs[] = $v->validate();
         } //if    
      }//foreach
  } //function ends
       
       
     public function getErrorMsgs(){
         $rmsgs = array();
         foreach($this->v_error_msgs as $m) {
           $rmsgs[] = $m['msg']; 
         }   
         return $rmsgs;
     } 
    
    
}
?>