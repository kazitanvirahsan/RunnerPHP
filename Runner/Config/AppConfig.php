<?php
/**
 * Provides array access
 */
namespace Runner\Config;

class AppConfig{
    /**
     * Data withing the configuration.
     *
     * @var array
     */
    public static $data = array();

    /**
     * Constructor.
     *
     * Data is read-only unless $allowModifications is set to true
     * on construction.
     *
     * @param  array   $array
     */
    public function __construct(array $data){
        
    }

    public static function ConfigFactory(array $data){
    // Check if already initialized then return old object    
        foreach($data as $key =>$value){
            self::$data[$key] = $value;
        }
    } 


     /**
     * Retrieve a value and return $default if there is no element set.
     *
     * @param  string $name
     * @param  mixed  $default
     * @return mixed
     */
    public static function get($name, $default = null)
    {

        if (array_key_exists($name, self::$data)) {
            return self::$data[$name];
        }
        
        return  $default;
    }

}


?>