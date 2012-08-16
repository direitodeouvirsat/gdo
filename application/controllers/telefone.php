<?php

class Telefone_Controller extends Base_Controller
{

	public $restful = true;

	public function __construct()
	{
		parent::__construct();
	}

	public function get_index()
	{
		if(Request::ajax())
		{
			return Response::json(array('telefones' => Session::get('lista_telefones')));
		}
		else
		{
			return Response::json(array('telefones' => Session::get('lista_telefones')));
		}
	}

	public function post_novo()
	{
		$regras = array(
				'ddd'		=>	'required',
				'numero'	=>	'required',
				'descricao'	=>	'max:100'
			);

		$validacao = Validator::make(Input::all(), $regras);

		if($validacao->fails())
		{
			if(Request::ajax())
			{
				return Response::json(array('erros' => $validacao));
			}
			else
			{
				return Redirect::to_action('telefone@novo')
					->with_errors($validacao)
					->with_inputs();
			}
		}
		else
		{
			if(Request::ajax())
			{
				$lista_telefones = array();
				if(Session::has('lista_telefones'))
				{
					$lista_telefones = Session::get('lista_telefones');
					$lista_telefones[] = Input::all();
				}
				else
				{
					$lista_telefones[] = Input::all();
					Session::put('lista_telefones', $lista_telefones);
				}
				return Response::json(array('mensagem' => 'Telefone salvo com sucesso.'));
			}
			else
			{
				
			}
		}
	}

}