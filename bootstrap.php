<?php
/**
 * @author Matthias Jouan <matthias.jouan@gmail.com>
 * @license FreeBSD License (http://opensource.org/licenses/BSD-2-Clause)
 */
 
session_start() ;

require_once 'vendor/autoload.php';

// error reporting
error_reporting(E_ALL);

// PLUX!
\Plux\Plux::initialize();
// plux : stores
\Plux\Plux::addStore('Items', new \Plux\Demo\Store\Items());
\Plux\Plux::addStore('ActionLog', new \Plux\Demo\Store\ActionLog());


// routes
$prefix = substr(__DIR__, strlen($_SERVER['DOCUMENT_ROOT']));

$routes = [
	$prefix.'/' => ['\\Plux\Demo\\Controller\\IndexController', 'index'],
	$prefix.'/?add' => ['\\Plux\Demo\\Controller\\IndexController', 'add'],
	$prefix.'/?delete' => ['\\Plux\Demo\\Controller\\IndexController', 'delete']
];