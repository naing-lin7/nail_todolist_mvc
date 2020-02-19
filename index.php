<?php 
$database = require 'core/bootstrap.php';

//build insert
$router = new Router;

require 'routes.php';

$uri=trim(parse_url($_SERVER["REQUEST_URI"])['path'],'/');

require $router->direct($uri);