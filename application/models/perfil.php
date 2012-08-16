<?php

class Perfil extends Eloquent
{
	public static $table = 'perfis';

	public function usuarios()
	{
		return $this->has_many('Usuario');
	}

	public function telas()
	{
		return $this->has_many_and_belongs_to('Tela');
	}

}