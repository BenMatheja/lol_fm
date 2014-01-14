<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 1/14/14
 * Time: 8:19 PM
 */

$app->get(
    '/profile',
    function() use ($app,$config){
        $app->render('profile.html');
    }
);

$app->get(
    '/profile/:id',
    function ($id) use ($app, $config) {
        $summoner = Model::factory('summoner')->find_one($id);
        if ($summoner) {
            $app->view()->setData(array(
                'name' => $summoner->name

            ));
            $app->render('summoner/detail.html');
        } else {
            $app->pass();
        }
    });