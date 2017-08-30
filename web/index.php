<?php
// web/index.php
require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();

// definitions

$app['debug'] = true;

// using twig template
$app->register(new Silex\Provider\TwigServiceProvider(), [
    'twig.path' => __DIR__.'/../views',
]);

//using Doctrine DBAL

$app->register(new Silex\Provider\DoctrineServiceProvider9(), [
	'db.options' => [
		'driver' => 'pdo_sqlite',
		'path' => __DIR__.'/../database/app.db',
	],


]);

$app->get('/bookings/create', function () use ($app) {
   

    return $app['twig']->render('base.html.twig');

});

$app->run();
?>