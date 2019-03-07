<?php
if (PHP_SAPI == 'cli-server') {
    // To help the built-in PHP dev server, check if the request was actually for
    // something which should probably be served as a static file
    $url  = parse_url($_SERVER['REQUEST_URI']);
    $file = __DIR__ . $url['path'];
    if (is_file($file)) {
        return false;
    }
}

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require __DIR__ . '/../vendor/autoload.php';
require '../includes/DbOperations.php';

session_start();

// Instantiate the app
$settings = require __DIR__ . '/../src/settings.php';
$app = new \Slim\App($settings);

//Code here
$app->get('/test/{location}/{year}/{month}/{begin}/{end}', function(Request $request, Response $response, array $args){
	$location = $args['location'];
	$year = $args['year'];
	$month = $args['month'];
	$begin = $args['begin'];
	$end = $args['end'];
    $db = new DbOperations; 
    $response_data = $db->GetTideCurrentByDate($location, $year, $month, $begin, $end);
    $response->write(json_encode($response_data));
    return $response
    ->withHeader('Content-type', 'application/json')
    ->withStatus(200);  
});

$app->get('/location/{lat}/{long}/{step}', function(Request $request, Response $response, array $args){
	$lat = $args['lat'];
	$long = $args['long'];
	$step = $args['step'];
	
    $db = new DbOperations; 
    $response_data = $db->GetLocation($lat, $long, $step);
    $response->write(json_encode($response_data));
    return $response
    ->withHeader('Content-type', 'application/json')
    ->withStatus(200);  
});

// Run app
$app->run();
