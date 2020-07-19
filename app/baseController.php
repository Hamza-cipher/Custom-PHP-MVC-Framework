<?php

/**
 * baseController: Base Controller Class or "We can say main controller"
 */
abstract class baseController 
{
	public function method($model){		// function to fetch model file 
		if(file_exists('..'.ROOT_URL.'models/'.$model. '.php')){
			require_once '..'.ROOT_URL.'models/'.$model. '.php';
			return new $model;
		}
	}

	public function view($view, $data=array()){		// function to fetch view file 
		if(file_exists('..'.ROOT_URL.'views/'.$view.'.php')){
			require_once '..'.ROOT_URL.'views/'.$view. '.php';
		}
	}

	public function authentication(){ 	 // Redirecting to ROOT if session is not set
		if(!isset($_SESSION['email'])){ 
			header('location: '.ROOT_PATH); exit;
		}
	}
}