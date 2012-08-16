<?php

class Tela_Controller extends Base_Controller
{

	public $restful = true;

	public function __construct()
	{
		$this->filter('before', 'acesso');
	}

	public function get_novo()
	{
		echo 'cadastrar tela';
	}

	public function get_index()
	{
		echo 'lista telaes';
	}

	public function get_edita()
	{
		echo 'edita telaes';
	}

	public function get_exclui()
	{
		echo 'exclui telaes';
	}

}