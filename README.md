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
// Add database credentials

define("DB_HOST", "");
define("DB_USER", "");
define("DB_PASS", "");
define("DB_NAME", "");

// Add your directory name for URL routing. Currently it's this project's directory name Custom-PHP-MVC-Framework
define("ROOT_URL", "/Custom-PHP-MVC-Framework/");
define("ROOT_PATH", 'http://'.$_SERVER['HTTP_HOST'].'/Custom-PHP-MVC-Framework/');
```
## Routing
The [Router](https://github.com/Hamzi-hash/Custom-PHP-MVC-Framework/blob/master/app/router.php) translates URL into controllers and actions. You don't need to create routes because they are already created in [app/router](https://github.com/Hamzi-hash/Custom-PHP-MVC-Framework/blob/master/app/router.php) class.

## Models
Models are used to store and retrieve data from database in application. Models don't know anything about how data is presented in views i.e. frontend. The 'Base Model' is in 'app/baseModel.php' which have the database connection in it. Models extends 'app/baseModel' class for database and 'CRUD (Create, Read, Update and Delete)' operations. I have also written dynamic functions for CRUD operations in the Base Model, read the comments in [baseModel](https://github.com/Hamza921/Custom-PHP-MVC-Framework/blob/master/app/baseModel.php) class to understand usage. All models should be created in 'models' folder. A sample home model class is added in [models](https://github.com/Hamza921/Custom-PHP-MVC-Framework/blob/master/models/homeModel.php).

## Controllers
Controllers renders view and responds to user actions like submitting a form etc. Controller classes extends from [app/baseController](https://github.com/Hamza921/Custom-PHP-MVC-Framework/blob/master/app/baseController.php) class. A sample [home controller](https://github.com/Hamza921/Custom-PHP-MVC-Framework/blob/master/controllers/home.php) is added in 'controllers' folder.

A controller can get data from it's model class to render in the view. See the code below:
```PHP
  // Gets data from homeModel
  $model = new homeModel();
  $data = $model->Index();
  // Passing the data in view
	$this->view('home/index', $data);
```

## Views
Views are used to presents information and data normally in HTML. For ease to understand we can simply call a view as our frontend. Views can have a little bit of PHP in it just enough to get data, They should not have any database access or anything like that. You can render a view in 'controller', optionally passing data like this:
```PHP
	$this->view('home/index', $data);
```
The '$data' could contain an array of data or a single variable you want to present on your view. The above line of code is rendering view from a controller. You can loop the '$data' and present in HTML in view. A sample view class is added in [views/home](https://github.com/Hamza921/Custom-PHP-MVC-Framework/blob/master/views/home/index.php).

## Web Server Configuration
URL rewrite us enabled using web server rewrite rules. An [.htaccess](https://github.com/Hamza921/Custom-PHP-MVC-Framework/blob/master/.htaccess) file is included.
