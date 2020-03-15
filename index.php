<?php
require 'config/debug.php';
require 'config/autoload.php';

use core\Router;

session_start();

$router = new Router;
$router->run();
