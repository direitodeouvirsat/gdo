<?php

class Base_Controller extends Controller {

	public function __construct()
	{
		$this->filter('before', 'acesso')->except(array('sair', 'login'));
	}

	public function __call($method, $parameters)
	{
		return Response::error('404');
	}

}