<?php

// Add database credentials and information here

define("DB_HOST", "");
define("DB_USER", "");
define("DB_PASS", "");
define("DB_NAME", "");

// Define your directory path and url path here
define("ROOT_URL", "/Custom-PHP-MVC-Framework/");
define("ROOT_PATH", 'http://'.$_SERVER['HTTP_HOST'].'/Custom-PHP-MVC-Framework/');

// Constants for Autoload class: Autoload class automatically include files followed by class names
define("DIR", __DIR__);
define("DS", DIRECTORY_SEPARATOR);
define("CLASSES", DIR.DS."APP");
define("CONTROLLERS", DIR.DS."CONTROLLERS");
define("VIEWS", DIR.DS."VIEWS");
define("MODELS", DIR.DS."MODELS");

define("AUTOLOAD_CLASSES", serialize(array(CLASSES, CONTROLLERS, VIEWS, MODELS)));
