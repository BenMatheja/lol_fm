<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 12/01/14
 * Time: 16:04
 */
/**
 * Database
 *
 * implements Singleton Pattern
 * Returns one static object via Get()
 */
include_once 'Config.php';

class Database
{
    public static $dbLink;

    /**
     * returns the reference to the only possible mysql resource
     * @return unknown
     */
    public static function Get()
    {
        if (!self::$dbLink) {
            self::$dbLink = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_SELECT);
            if (!self::$dbLink) {
                throw new Exception("Database connection failed: " . mysql_error());
            }
        }
        return self::$dbLink;
    }

    public function Destroy()
    {
        self::$dbLink = null;
    }

 }


?>