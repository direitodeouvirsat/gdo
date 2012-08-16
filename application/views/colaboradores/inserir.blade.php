@layout('templates.geral')
@section('content')

	<div class="widget">

		<div class="widget-header">
			<i class="icon-user"></i>
			<h3>Inserir novo colaborador</h3>
		</div> <!-- /widget-header -->
		@include('templates.mensagem')
		<div class="widget-content">
		
			<div class="tabbable">

				<ul class="nav nav-tabs">
				  <li class="active"><a href="#profile" data-toggle="tab">Perfil</a></li>
				  <li class=""><a href="#telefones" data-toggle="tab">Telefones</a></li>
				  <li class=""><a href="#enderecos" data-toggle="tab">Endereços</a></li>
				  <li class=""><a href="#social" data-toggle="tab">Redes Sociais</a></li>
				  <li class=""><a href="#bancarios" data-toggle="tab">Dados Bancários</a></li>
				</ul>
				
				<br>
			
				<div class="tab-content">
					<!-- PERFIL -->
					<div class="tab-pane active" id="profile">
						{{ Form::open_for_files('colaborador', 'POST') }}
							<fieldset>

								<div class="row">

									<div class="span5">

										<div class="control-group">
											{{ $errors->first('nome', '<span class="label label-warning">:message</span>') }}
											<label class="control-label" for="nome">Nome Completo</label>
											<div class="controls">
												{{ Form::text('nome', Input::old('nome'), array('class' => 'span3')) }}
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="sexo">Sexo</label>
											<div class="controls">
												{{ Form::select('sexo', array('0' => 'Masculino', '1' => 'Feminino'), Input::old('sexo')) }}
											</div>			
										</div>


										<div class="control-group">
											<label class="control-label" for="status">Estado Civil</label>
											<div class="controls">
												{{ Form::select('estado_civil', array('Solteiro(a)' => 'Solteiro(a)', 'Casado(a)' => 'Casado(a)', 'Separado(a)' => 'Separado(a)', 'Divorciado(a)' => 'Divorciado(a)', 'Viúvo(a)' => 'Viúvo(a)'), Input::old('estado_civil')) }}
											</div>			
										</div>

										<div class="control-group">
											{{ $errors->first('cpf', '<span class="label label-warning">:message</span>') }}							
											<label class="control-label" for="cpf">CPF</label>
											<div class="controls">
												{{ Form::text('cpf', Input::old('cpf'), array('class' => 'input-medium', 'id' => 'cpf')) }}
											</div>
										</div>

										<div class="control-group">	
											{{ $errors->first('rg', '<span class="label label-warning">:message</span>') }}
											<label class="control-label" for="rg">RG</label>
											<div class="controls">
												{{ Form::text('rg', Input::old('rg'), array('class' => 'input-medium')) }}
											</div>
										</div>

										<div class="control-group">
											{{ $errors->first('foto', '<span class="label label-warning">:message</span>') }}
											<label class="control-label" for="foto">Foto</label>
											<div class="controls">
												<img src="http://placehold.it/200x200">
												<hr />
												<p>
													{{ Form::file('foto') }}
													<br/>
													<p class="help-block">*A imagem será substituida em caso de alteração</p>
												</p>
											</div>
										</div>

									</div>

									<div class="span5">

										<div class="control-group">
											{{ $errors->first('data_nascimento', '<span class="label label-warning">:message</span>') }}									
											<label class="control-label" for="data_nascimento">Data Nascimento</label>
											<div class="controls">
												{{ Form::text('data_nascimento', Input::old('data_nascimento'), array('class' => 'input-small', 'id' => 'data_nascimento')) }}
											</div>
										</div>

										<div class="control-group">
											{{ $errors->first('usuario', '<span class="label label-warning">:message</span>') }}									
											<label class="control-label" for="usuario">Usuário</label>
											<div class="controls">
												{{ Form::text('usuario', Input::old('usuario'), array('class' => 'input-medium')) }}
											</div>
										</div>

										<div class="control-group">
											{{ $errors->first('senha', '<span class="label label-warning">:message</span>') }}
											<label class="control-label" for="senha">Senha</label>
											<div class="controls">
												{{ Form::password('senha', array('class' => 'input-medium')) }}
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="status">Perfil</label>
											<div class="controls">
												{{ Form::select('perfil', $perfis, Input::old('perfil')) }}
											</div>			
										</div>

										<div class="control-group">
											<label class="control-label" for="status">Status</label>
											<div class="controls">
												{{ Form::select('status', array('1' => 'Ativo', '0' => 'Inativo', '2' => 'Bloqueado'), Input::old('status')) }}
											</div>			
										</div>

										<div class="control-group">
											<label class="control-label">Observações</label>
											<div class="controls">
												{{ Form::textarea('observacoes', Input::old('observacoes'), array('class' => 'input-xlarge')) }}
											</div>	
										</div>

									</div>

								</div><!-- FIM DIV ROW -->
								<div class="form-actions">
									<button type="submit" class="btn btn-success">Gravar</button>
								</div>
							</fieldset>

						{{ Form::close() }}

					</div>

					@include('templates.aba_enderecos')

					@include('templates.aba_telefones')

					@include('templates.aba_redes_sociais')

					@include('templates.aba_dados_bancarios')
					
				</div>
			  
			</div>
		
		</div> <!-- /widget-content -->
						
	</div> <!-- /widget -->
@endsection