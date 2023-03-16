<?php

// Displays all the errors during the development
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Retrieves the site's controller
require_once "controllers/SiteController.php";

// Retrieves $routes
require_once("config/routes.php");

// Starts the session
session_start();

$controller = new SiteController();

// Selection of the requested
$chemin = $_GET["path"] ?? "index";

// Retrieves the required method for the route
$methode = $routes[$chemin] ?? "error404";

// Dynamically calls the method from the controller
$controller->{$methode}();