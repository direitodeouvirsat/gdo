<?php

class Colaborador_Controller extends Base_Controller
{

	public $restful = true;

	public function __construct()
	{
		parent::__construct();
	}

	public function get_novo()
	{
		return View::make('colaboradores.inserir')
						->with('perfis', Perfil::lists('descricao', 'id'));
	}

	public function get_index()
	{
		return View::make('colaboradores.listar')
						->with('colaboradores', Colaborador::all());
	}

	public function post_novo()
	{
		$regras = array(
				'nome'				=>	'required',
				'cpf'				=>	'required',
				'rg'				=>	'required',
				'data_nascimento'	=>	'required',
				'usuario'			=>	'required|max:45',
				'senha'				=>	'required',
				'foto'				=>	'image|max:500'
			);

		$validacao = Validator::make(Input::all(), $regras);

		if($validacao->fails())
		{
			return Redirect::to_action('colaborador@novo')
								->with_errors($validacao)
								->with_input();
		}
		else
		{
			$usuario = new Usuario();
			$usuario->usuario = Input::get('usuario');
			$usuario->senha = Hash::make(Input::get('senha'));
			$usuario->perfil_id = Input::get('perfil');
			$usuario->status = Input::get('status');
			
			$usuario->save();

			if(!is_null($usuario->id))
			{
				$colaborador = new Colaborador();
				$colaborador->nome = Input::get('nome');
				$colaborador->cpf = str_replace('.', '', str_replace('-', '', Input::get('cpf')));
				$colaborador->rg = Input::get('rg');
				$colaborador->data_nascimento = strtotime(str_replace('/','-', Input::get('data_nascimento')));
				$colaborador->data_cadastro = strtotime("now");
				$colaborador->estado_civil = Input::get('estado_civil');
				$colaborador->sexo = Input::get('sexo');
				$colaborador->observacoes = Input::get('observacoes');

				$foto = Input::file('foto');
				if($foto['name'] != '')
				{
					$colaborador->foto = 'colaboradores/' . $foto['name'];
					Bundle::start('resizer');
					Resizer::open( $foto )
						->resize( 200 , 200 , 'auto' )
						->save( path('public') . '/uploads/colaboradores/' . $foto['name'], 90 );
				}

				$colaborador->usuario_id = $usuario->id;

				$colaborador->save();

				if(!is_null($colaborador->id))
				{
					return Redirect::to_action('colaborador@novo')
							->with('mensagem', 'Colaborador salvo com sucesso.')
							->with('gravidade', 'success')
							->with('icone', 'icon-ok');
				}
				else
				{
					return Redirect::to_action('colaborador@novo')
							->with('mensagem', 'Não foi possível criar o colaborador.')
							->with('gravidade', 'important')
							->with('icone', 'icon-ban-circle')
							->with_input();
				}
			}
			else
			{
				return Redirect::to_action('colaborador@novo')
						->with('mensagem', 'Não foi possível criar o usuário.')
						->with('gravidade', 'important')
						->with('icone', 'icon-ban-circle')
						->with_input();
			}
		}
	}

}