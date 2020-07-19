<?php
/**
 * Home controller class
 */
class home extends baseController
{
	
	public function Index(){
		$model = new homeModel();
		$data = $model->Index();
		$this->view('home/index', $data);
	}
}