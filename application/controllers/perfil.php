<?php

class Perfil_Controller extends Base_Controller
{

	public $restful = true;

	public function __construct()
	{
		$this->filter('before', 'acesso');
	}

	public function get_novo()
	{
		echo 'cadastrar perfil';
	}

	public function get_index()
	{
		echo 'lista perfiles';
	}

	public function get_edita()
	{
		echo 'edita perfiles';
	}

	public function get_exclui()
	{
		echo 'exclui perfiles';
	}

}