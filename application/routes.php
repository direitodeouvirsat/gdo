<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Simply tell Laravel the HTTP verbs and URIs it should respond to. It is a
| breeze to setup your application using Laravel's RESTful routing and it
| is perfectly suited for building large applications and simple APIs.
|
| Let's respond to a simple GET request to http://example.com/hello:
|
|		Route::get('hello', function()
|		{
|			return 'Hello World!';
|		});
|
| You can even respond to more than one URI:
|
|		Route::post(array('hello', 'world'), function()
|		{
|			return 'Hello World!';
|		});
|
| It's easy to allow URI wildcards using (:num) or (:any):
|
|		Route::put('hello/(:any)', function($name)
|		{
|			return "Welcome, $name.";
|		});
|
*/

Route::get('login', 'usuario@login');
Route::post('login', 'usuario@login');

Route::group(array('before' => 'auth'), function()
{
	Route::get('/', 'home@index');

	Route::group(array('before' => 'accesso'), function()
	{

		/*COLABORADOR*/
		Route::get('colaborador', 'colaborador@index');
		Route::post('colaborador', 'colaborador@novo');
		Route::put('colaborador', 'colaborador@novo');
		Route::delete('colaborador', 'colaborador@novo');

		/*TELA*/
		Route::get('tela', 'tela@index');
		Route::post('tela', 'tela@novo');
		Route::put('tela', 'tela@exclui');
		Route::delete('tela', 'perfil@edita');

		/*PERFIL*/
		Route::get('perfil', 'perfil@index');
		Route::post('perfil', 'perfil@novo');
		Route::put('perfil', 'perfil@exclui');
		Route::delete('perfil', 'perfil@edita');

		/*TELEFONE*/
		Route::get('telefone', 'telefone@index');
		Route::post('telefone', 'telefone@novo');
		Route::put('telefone', 'telefone@atualiza');
		Route::delete('telefone', 'telefone@exclui');

	});
	// $this->filter('before', 'acesso')->except(array('sair', 'login'));
});

/*
|--------------------------------------------------------------------------
| Application 404 & 500 Error Handlers
|--------------------------------------------------------------------------
|
| To centralize and simplify 404 handling, Laravel uses an awesome event
| system to retrieve the response. Feel free to modify this function to
| your tastes and the needs of your application.
|
| Similarly, we use an event to handle the display of 500 level errors
| within the application. These errors are fired when there is an
| uncaught exception thrown in the application.
|
*/

Event::listen('401', function()
{
	return Response::error('401');
});

Event::listen('404', function()
{
	return Response::error('404');
});

Event::listen('500', function()
{
	return Response::error('500');
});

/*
|--------------------------------------------------------------------------
| Route Filters
|--------------------------------------------------------------------------
|
| Filters provide a convenient method for attaching functionality to your
| routes. The built-in before and after filters are called before and
| after every request to your application, and you may even create
| other filters that can be attached to individual routes.
|
| Let's walk through an example...
|
| First, define a filter:
|
|		Route::filter('filter', function()
|		{
|			return 'Filtered!';
|		});
|
| Next, attach the filter to a route:
|
|		Router::register('GET /', array('before' => 'filter', function()
|		{
|			return 'Hello World!';
|		}));
|
*/

/*VALIDA PERMISSÕES DE CADA REQUISIÇÃO FEITA*/

Route::filter('acesso', function()
{
	$request = Request::route();

	$controller = $request->controller;
	if(in_array($controller, Session::get('lista_controllers')))
	{
		foreach (Session::get('lista_menu') as $acessos)
		{
			foreach($acessos as $acesso)
			{
				if($controller == $acesso["controller"] and $request->method != 'GET')
				{
					if($acesso[$request->method] != 1)
					{
						return Response::error('401');
					}
				}
			}
		}
	}
	else
	{
		return Response::error('401');
	}

});

Route::filter('before', function()
{
	// Do stuff before every request to your application...
});

Route::filter('after', function($response)
{
	// Do stuff after every request to your application...
});

Route::filter('csrf', function()
{
	if (Request::forged()) return Response::error('500');
});

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::to_action('login');
});