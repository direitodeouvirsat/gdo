<?php

class Usuario_Controller extends Base_Controller
{

	public $restful = true;

	public function get_teste()
	{
		echo 'teste';
	}

	public function get_login()
	{
		Session::forget('lista_menu');
		Auth::logout();
		return View::make('login.index');
	}

	public function post_login()
	{

		$regras = array(
				'usuario'	=>	'required',
				'senha'		=>	'required'
			);

		$v = Validator::make(Input::all(), $regras);

		if($v->fails())
		{
			return Redirect::to('login')
					->with_errors($v)
					->with_input();
		}
		else
		{

			$login = array( 'username' => Input::get('usuario'), 'password' => Input::get('senha'), 'status' => '1' );

			if( Auth::attempt($login) )
			{
				$usuario = Usuario::find(Auth::user()->id);

				$categorias = DB::table('perfil_tela')
									->join('telas', 'telas.id', '=', 'perfil_tela.tela_id')
									->where('perfil_tela.perfil_id', '=', $usuario->perfil_id)
									->group_by('telas.categoria')->get();
				if( sizeof($categorias) > 0 )
				{

					$lista_controllers = array();
					foreach( $categorias as $categoria )
					{
						$telas = DB::table('telas')
								->join('perfil_tela', 'perfil_tela.tela_id', '=', 'telas.id')
								->where('categoria', '=', $categoria->categoria)
								->where('perfil_tela.perfil_id', '=', $usuario->perfil_id)
								->get(array('telas.descricao',
											'telas.controller',
											'telas.icone',
											'perfil_tela.post',
											'perfil_tela.put',
											'perfil_tela.delete'
										)
								);
						if(is_array($telas))
						{
							$count = 0;
							foreach ($telas as $tela)
							{	
								$permissoes[$categoria->categoria][$count]['descricao'] = $tela->descricao;
								$permissoes[$categoria->categoria][$count]['icone'] = $tela->icone;
								$permissoes[$categoria->categoria][$count]['controller'] = $tela->controller;
								$permissoes[$categoria->categoria][$count]['post'] = $tela->post;
								$permissoes[$categoria->categoria][$count]['put'] = $tela->put;
								$permissoes[$categoria->categoria][$count]['delete'] = $tela->delete;
								$count++;
								$lista_controllers[] = $tela->controller;
							}
						}
					}
					Session::put('lista_menu', $permissoes);
					Session::put('lista_controllers', $lista_controllers);
				}
				else
				{
					return Redirect::to('login')
							->with('mensagem', 'Não foi possível definir suas permissões.')
							->with('gravidade', 'important')
							->with('icone', 'icon-ban-circle')
							->with_input();
				}
				return Redirect::to('/');
			}
			else
			{
				return Redirect::to('login')
						->with('mensagem', 'Usuário não encontrado.')
						->with('gravidade', 'warning')
						->with_input();
			}
		}
	}

}