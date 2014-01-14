<?php
/*
*CONFIG
*/
//Define("CLASS_LOG", 'vendor/apache/log4php/src/main/php/Logger.php');
$basedir = __DIR__ . '/../';

return array(
// Environment
    'php.error_reporting' => E_ALL,
    'php.display_errors'  => true,
    'php.log_errors'      => true,
    'php.error_log'       => $basedir . 'logs/errors.txt',
    'php.date.timezone'   => 'Europe/Berlin',

    /*
    // SQLite
        'db.dsn'              => 'sqlite:' . $basedir . 'db/sqlite.db',
    */
// MySQL
    'db.dsn'             => 'mysql:host=suchtundordnung.de;dbname=test',
    'db.username'        => 'db_lol_remote',
    'db.password'        => 'db_suo_lol',

// Application paths
    'path.routes'         => $basedir . 'routes/',
    'path.templates'      => $basedir . 'templates/'
);
?>