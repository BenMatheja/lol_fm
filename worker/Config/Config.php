<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 12/01/14
 * Time: 16:04
 */
define_once('DIR_BASE', dirname(dirname(__FILE__)) . '/');
define_once('DIR_LOG', DIR_BASE . 'log/');

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