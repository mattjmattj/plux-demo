<?php
/**
 * @author Matthias Jouan <matthias.jouan@gmail.com>
 * @license FreeBSD License (http://opensource.org/licenses/BSD-2-Clause)
 */ 
 
require_once 'bootstrap.php';

$path = $_SERVER['REQUEST_URI'];

if (isset($routes[$path])) {
	call_user_func($routes[$path]);
} else {
	header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
	echo "404 Not Found";
}
