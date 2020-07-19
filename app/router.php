 <?php

/**
 * Router Class: this class is used for routing our requests and methods 
 */
class router 
{
	protected $controller = "home";
	protected $method = "index";
	protected $params = [];

	public function __construct() 
	{
		$url = $this->parseUrl();
		if(file_exists('..'.ROOT_URL.'controllers/'.$url[0].''.'.php')){	// checking for controller classes
			$this->controller = $url[0]; // Setting up controller
			unset($url[0]);
		}
		require_once '..'.ROOT_URL.'controllers/'.$this->controller.'.php';
		$this->controller = new $this->controller();
		if(isset($url[1])){
			if(method_exists($this->controller, $url[1])){	// Checking for methods
				$this->method = $url[1];	// setting up methods
				unset($url[1]);
			}
		}
		$this->params = $url ? array_values($url) : [];	//adding parameters in URL
		call_user_func_array([$this->controller, $this->method], $this->params);	
	}	
	

	public function parseUrl(){
		if(isset($_GET['url'])){	// $_GET['url'] is getting 'url' param from .htaccess file
			return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL)); // exploding URL
		}
	}
}