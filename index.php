<?php
/**
 * @author Matthias Jouan <matthias.jouan@gmail.com>
 * @license FreeBSD License (http://opensource.org/licenses/BSD-2-Clause)
 */ 
 
session_start() ;

require_once 'vendor/autoload.php';

// PLUX!
\Plux\Plux::initialize();

// plux : stores
\Plux\Plux::addStore('Items', new \Plux\Demo\Store\Items());
\Plux\Plux::addStore('ActionLog', new \Plux\Demo\Store\ActionLog());

// plux : components
$components = [
	'header' 	=> new \Plux\Demo\Component\Header (),
	'footer' 	=> new \Plux\Demo\Component\Footer (),
	'todolist' 	=> new \Plux\Demo\Component\TodoList (),
	'addform' 	=> new \Plux\Demo\Component\AddForm (),
	'log' 		=> new \Plux\Demo\Component\Log (),
	'flash' 	=> new \Plux\Demo\Component\Flash ()
];


// routes
$prefix = substr(__DIR__, strlen($_SERVER['DOCUMENT_ROOT']));

$routes = [];
foreach ($components as $component) {
	foreach ($component->getRoutes() as $route => $callable) {
		$routes[$prefix.$route] = $callable;
	}
}

$path = $_SERVER['REQUEST_URI'];
if (isset($routes[$path])) {
	call_user_func($routes[$path]);
}


// rendering
extract($components);
include'View/index.php';
