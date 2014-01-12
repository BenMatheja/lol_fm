<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 12/01/14
 * Time: 14:26
 */
// Define Pimple DI container

use Slim\Slim;
use Slim\Views\Twig;

$config = require dirname(__FILE__) . '/../config/config.php';

$app =
$app = new Slim(array(
    'view' => new Twig(),
    'templates.path' => $config['path.templates']
));

$twig = $app->view()->getEnvironment();
$twig->enableDebug();
$twig->addExtension(new Twig_Extension_Debug());

switch (substr($config['db.dsn'], 0, 5)) {
    // MySQL database
    case 'mysql':
        ORM::configure($config['db.dsn']);
        ORM::configure('username', $config['db.username']);
        ORM::configure('password', $config['db.password']);
        ORM::configure('driver_options', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        break;

    // SQLite database
    case 'sqlit':
        ORM::configure($config['db.dsn']);
        break;

    default:
        throw new UnexpectedValueException('Unknown database');
}