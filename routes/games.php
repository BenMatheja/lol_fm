<?php
require_once '../models/Game.php';
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 15/01/14
 * Time: 00:16
 */
$app->get(
    '/games/:id',
    function ($id) use ($app, $config) {
        header("Content-Type: application/json");
        echo json_encode(Model::factory('Game')->find_one($id)->as_array());
    }
);