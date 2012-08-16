<!-- ENDERECOS -->
<div class="tab-pane" id="enderecos">

	<div class="row">

<!-- 		<div class="span2">

			<div class="control-group">									
				<label class="control-label" for="pais">País</label>
				<div class="controls">
					{{ Form::select('pais', array('B' => 'brasil'), NULL, array('class' => 'span2')) }}
				</div>			
			</div>

		</div> -->

		<div class="span2">

			<div class="control-group">									
				<label class="control-label" for="estado">Estado</label>
				<div class="controls">
					{{ Form::select('estado', array('SP' => 'sao paulo'), NULL, array('class' => 'span2')) }}
				</div>			
			</div>

		</div>

		<div class="span2">

			<div class="control-group">
				<label class="control-label" for="cidade">Cidade</label>
				<div class="controls">
					{{ Form::select('cidade', array('FR' => 'Franca'), NULL, array('class' => 'span2')) }}
				</div>			
			</div>

		</div>

	</div>

	<div class="row">

		<div class="span2">

			<div class="control-group">										
				<label class="control-label" for="cep">CEP</label>
				<div class="controls">
					{{ Form::text('cep', Input::old('cep'), array('class' => 'input-small', 'id' => 'cep')) }}
				</div>
			</div>

		</div>

		<div class="span3">

			<div class="control-group">										
				<label class="control-label" for="logradouro">Logradouro</label>
				<div class="controls">
					{{ Form::text('logradouro', NULL, array('class' => 'span3')) }}
				</div>				
			</div>

		</div>

		<div class="span1">

			<div class="control-group">
				<label class="control-label" for="numero">Número</label>
				<div class="controls">
					{{ Form::text('numero', NULL, array('class' => 'input-mini')) }}
				</div>				
			</div>

		</div>

		<div class="span2">

			<div class="control-group">									
				<label class="control-label" for="tipo">Tipo</label>
				<div class="controls">
					{{ Form::select('tipo', array('R' => 'Residencial', 'Entrega' => 'Entrega', 'Trabalho' => 'Trabalho'), NULL, array('class' => 'span2')) }}
				</div>			
			</div>

		</div>

		<div class="span2">

			<div class="control-group">
				<label class="control-label" for="complemento">Complemento</label>
				<div class="controls">
					{{ Form::text('complemento', NULL, array('class' => 'span2')) }}
				</div>				
			</div>

		</div>

	</div>

	<div class="row">
		<div class="span1">
			<button type="submit" class="btn btn-success">Adicionar	</button>
		</div>
	</div>

</div>