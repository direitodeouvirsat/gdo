<?php

class Guarda extends Laravel\Auth\Drivers\Eloquent
{

	/**
	 * Attempt to log a user into the application.
	 *
	 * @param  array  $arguments
	 * @return void
	 */
	public function attempt($arguments = array())
	{
		$user = $this->model()->where(
			function ($query) use($arguments)
			{
				$username = Config::get('auth.username');

				$query->where($username, '=', $arguments['username']);
				foreach( array_except($arguments, array('username', 'password')) as $coluna => $valor)
				{
					$query->where($coluna, '=', $valor);
				}
			}
		)->first();

		// This driver uses a basic username and password authentication scheme
		// so if the credentials match what is in the database we will just
		// log the user into the application and remember them if asked.
		$password = $arguments['password'];

		$password_field = Config::get('auth.password', 'password');

		if ( ! is_null($user) and Hash::check($password, $user->get_attribute($password_field)))
		{
			return $this->login($user->id, array_get($arguments, 'remember'));
		}

		return false;
	}

}