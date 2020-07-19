# Custom-PHP-MVC-Framework
   This is a very basic MVC Framework written in simple PHP using Object Oriented Model. It's free and [open-source](https://github.com/Hamzi-hash/Custom-PHP-MVC-Framework/blob/master/LICENSE)

 ## Start using this framework
1. Download the framework either directly or clone the repo
2. Open [config.php](https://github.com/Hamzi-hash/Custom-PHP-MVC-Framework/blob/master/config.php) and enter your database configuration.
3. Routes are already created, you just need to change directory name with your directory name in [config.php](https://github.com/Hamzi-hash/Custom-PHP-MVC-Framework/blob/master/config.php).
4. Add models, views and controllers

Please see details below for better understanding.

## Configuration
[config.php](https://github.com/Hamzi-hash/Custom-PHP-MVC-Framework/blob/master/config.php) file contains all the configurations.
Default configurations includes database credentials and basic directory root settings. Add your database credentials and your directory name for routing. See code below for reference.
```PHP
// Add database credentials and information here

define("DB_HOST", "");
define("DB_USER", "");
define("DB_PASS", "");
define("DB_NAME", "");

// Define your directory path and url path here
define("ROOT_URL", "/Custom-PHP-MVC-Framework/");
define("ROOT_PATH", 'http://'.$_SERVER['HTTP_HOST'].'/Custom-PHP-MVC-Framework/');
```
## Routing
The [Router](https://github.com/Hamzi-hash/Custom-PHP-MVC-Framework/blob/master/app/router.php) translates URL into controllers and actions. You don't need to create routes because they are already created in [app/router.php](https://github.com/Hamzi-hash/Custom-PHP-MVC-Framework/blob/master/app/router.php) class.
