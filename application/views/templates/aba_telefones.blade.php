<!-- TELEFONES -->
<div class="tab-pane" id="telefones">

	{{ Form::open('novo/telefone/', 'POST', array('id' => 'cadTelefone')) }}
	<div class="row">

		<span id="erro_ddd">
		</span>
		<span id="erro_numero">
		</span>

		<div class="span2">

			<div class="control-group">									
				<label class="control-label" for="tipo">Tipo</label>
				<div class="controls">
					{{ Form::select('tipo', array('Redicencial' => 'Residencial', 'Comercial' => 'Comercial', 'Recado' => 'Recado'), NULL, array('class' => 'span2')) }}
				</div>			
			</div>

		</div>

		<div class="span1">
			<div class="control-group">
				<label class="control-label" for="ddd">DDD</label>
				<div class="controls">
					{{ Form::text('ddd', NULL, array('class' => 'input-mini')) }}
				</div>				
			</div>

		</div>

		<div class="span2">

			<div class="control-group">
				<label class="control-label" for="numero">Número</label>
				<div class="controls">
					{{ Form::text('numero', NULL, array('class' => 'input-medium')) }}
				</div>				
			</div>

		</div>

		<div class="span2">

			<div class="control-group">
				<label class="control-label" for="descricao">Descrição</label>
				<div class="controls">
					{{ Form::text('descricao', NULL, array('class' => 'span3')) }}
				</div>				
			</div>

		</div>

	</div>

	<div class="row">
		<div class="span1">
			<button type="submit" class="btn btn-success">Adicionar	</button>
		</div>
	</div>

	{{ Form::close() }}

</div>