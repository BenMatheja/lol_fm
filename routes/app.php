<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 14/01/14
 * Time: 14:41
 */
$app->get(
    '/',
    function () use ($app, $config) {
        $app->view()->setData(array(
            'active' => array('home'),
            'title' => 'LoLFM'
        ));
        $app->render('home.html');
    });

$app->get(
    '/profile',
    function () use ($app, $config) {
        $app->view()->setData(array(
            'active' => array('home'),
            'title' => 'LoLFM'
        ));
        $app->render('profile.html');
    }
);