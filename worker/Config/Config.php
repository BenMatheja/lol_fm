<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 12/01/14
 * Time: 16:04
 */
/**
 * define for directories
 */
define_once('DIR_BASE', dirname(dirname(__FILE__)) . '/');
define_once('DIR_LOG', DIR_BASE . 'log/');
require_once DIR_BASE.'../vendor/j4mie/idiorm/idiorm.php';
require_once DIR_BASE.'../vendor/j4mie/paris/paris.php';
/**
 * Configuration of idiORM
 */
ORM::configure('mysql:host=suchtundordnung.de;dbname=lol_fm');
ORM::configure('username', 'db_lol_remote');
ORM::configure('password', 'db_suo_lol');
/**
 * deprecated defines of DB
 */
define_once('DB_HOST', 'suchtundordnung.de');
define_once('DB_USER', 'db_lol_remote');
define_once('DB_PASSWORD', 'db_suo_lol');
define_once('DB_SELECT', 'lol_fm');
/**
 * default_timezone set to Europe/Berlin
 */
date_default_timezone_set('Europe/Berlin');
/**
 * defines a GLOBAL once
 */
function define_once($define, $value)
{
    if (!defined((string)$define)) {
        define($define, $value);
        return true;
    }
    return false;
}