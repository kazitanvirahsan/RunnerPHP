<?php
/**
 * namespace for class - 'PrebuiltHTMLCache'
 */
namespace Runner\Cache;

class PrebuiltHTMLCache {
   /**
    *  This function will calculate the number of days any file has been created
    *  $fileloc as a input: location of any particular file  
    *  return $fileAge_in_days : returns number of days the file has been created
    */
   public function getFileAgeinDays($fileloc){
       if(!file_exists($fileloc)) {
           // if file does not exists then create one
           $ourFileHandle = fopen($fileloc, 'w') or die("can't open file");
           // return a big number suggesting that call doPrebuiltHTML
           return 10000; 
       }
       $secs = time() - filemtime($fileloc);
       return floor($secs/86400);
   }
   
   /**
    * This function will transfer the content from $filesrc to $filedest
    * @param string $filesrc : file location as a source
    * @param string $filecache : file location as a destination
    * @param array $data :  list of variables in an array needed to replacing to actual data inside a page
    */
   public function doPrebuiltHTML($filesrc , $filedest , $data){
       
       //print_r($data);
       //exit();
       
       // Remove $filedest 
       unlink($filedest);
        
       // Start output buffering
       ob_start();
       
       // generate html for sidebar_menu
       include($filesrc);
       
       // store generated-html sidebar into temp variable
       $temp = ob_get_contents();
       
       // saving captured output to a file
       file_put_contents($filedest, $temp);
       
       // end buffering
       ob_end_clean();
   } 
   
} 