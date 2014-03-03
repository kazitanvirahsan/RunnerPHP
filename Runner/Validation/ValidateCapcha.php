<?php

//define namespace
namespace Runner\Validation;
use Runner\Config;
  require_once(  Config\AppConfig::get('APPLICATION_ROOT')  .  '/lib/recaptcha-php-1.11/recaptchalib.php');
   /*Check alphabet */
  class ValidateCapcha implements IValidator{
  
    private $inputData;
    public $privatekey = "6LeJsegSAAAAAHkT0_gbeZwJZNm8USm8ZKePOQk5";
 
    public function __construct($inputData){
        $this->inputData =  $inputData;
    }
      
    public function validate(){
         //try{
         $resp = recaptcha_check_answer ($this->privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);
         //}catch(Exception $e){
           // echo 'failure';
         
         //}
         //print_r($this->inputData);
         //exit();   
               
         if (!$resp->is_valid) {
             return array('msg' => 'capcha does not match');
         }
        return true;
    }   
  }
  
  ?>
