<?php
require_once 'config.php';
class database extends Config {

    
    private static $_instance = null;
    
 
    protected function __construct () {
        try {
            self::$_instance = new PDO(
                "mysql:host=" . self::$dbHost . ";dbname=" . self::$dbName,
                self::$dbUser,
                self::$dbUserPassword,
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING)
            );
            // echo "connection success \n";
        } catch (PDOException $e) {
            die($e->getMessage());
        }
        return self::$_instance;
    }

      /**
     * disconnect
     *
     * @return void
     */
    protected static function disconnect() : void {
        self::$_instance = null;
    }
}