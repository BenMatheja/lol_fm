<?php
require_once '../models/Summoner.php';
require_once '../models/Champion.php';
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 1/14/14
 * Time: 8:19 PM
 */

$app->get(
    '/summoners/:id',
    function ($id) use ($app, $config) {
        $summoner = Model::factory('Summoner')->find_one($id);
        $games = $summoner->getFullGameDetails($id);
        $app->view()->setData(array(
            'active' => array('summoner'),
            'title' => 'LoLFM',
            'summoner' => $summoner->as_array(),
            'games' => $games

        ));
       // var_dump($games);
        $app->render('summoner/profile.html');
    });