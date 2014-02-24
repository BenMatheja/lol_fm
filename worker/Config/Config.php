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
ORM::configure('');
ORM::configure('username', '');
ORM::configure('password', '');
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