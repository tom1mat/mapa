<?php

/**
 * Crea la conexion a la base de datos
 */
class DBconnection
{
    private static $db = null;
    static $host;
    static $dbname;
    static $user;
    static $pass;

    private function __construct(){

    }

    private static function connect(){
        try{

            self::$db = new PDO("mysql:host=".self::$host.";dbname=".self::$dbname.";charset=utf8", self::$user,self::$pass);
        }catch (Exception $e)
        {
            echo "No se puede conectar a la base de datos";
        }
    }
    public static function setData($host, $dbname, $user, $pass){
      self::$host = $host;
      self::$dbname = $dbname;
      self::$user = $user;
      self::$pass = $pass;
    }
    public static function getConnection()
    {
        if(empty(self::$db)){
            self::connect();
        }

        return self::$db;
    }

}
