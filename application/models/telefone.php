<?php

class Telefone extends Eloquent
{
	
	public function usuario()
	{
		return $this->belongs_to('Colaborador');
	}	

}