<?php
require_once __DIR__ . '/../lib/silex.phar';

$app = new Silex\Application();
$app['debug'] = true;

$app->get('/', function () {
    return "plop";
});

$app->get('/manual/{lang}/{id}', function (Silex\Application $app, $lang, $id) {
    if (!in_array($lang, array('en'))) {
        $app->abort(404, "Language $lang is not available.");
    }
    
    var_dump($id);
    
})
->value('id', 'index');

$app->run();


