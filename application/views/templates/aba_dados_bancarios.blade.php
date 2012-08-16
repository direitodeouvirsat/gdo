<!-- DADOS BANCARIOS -->
<div class="tab-pane" id="bancarios">

	<div class="row">

		<div class="span2">

			<div class="control-group">										
				<label class="control-label" for="cidade">Tipo de Conta</label>
				<div class="controls">
					{{ Form::select('cidade', array('CC' => 'conta corrente'), NULL, array('class' => 'span2')) }}
				</div>				
			</div>

		</div>

		<div class="span2">

			<div class="control-group">										
				<label class="control-label" for="banco">Banco</label>
				<div class="controls">
					{{ Form::text('banco', NULL, array('class' => 'input-medium')) }}
				</div>				
			</div>

		</div>

		<div class="span2">

			<div class="control-group">										
				<label class="control-label" for="agencia">Agência</label>
				<div class="controls">
					{{ Form::text('agencia', NULL, array('class' => 'input-medium')) }}
				</div>				
			</div>

		</div>

	</div>

	<div class="row">

		<div class="span3">

			<div class="control-group">										
				<label class="control-label" for="titular">Titular</label>
				<div class="controls">
					{{ Form::text('titular', NULL, array('class' => 'span3')) }}
				</div>			
			</div>

		</div>

		<div class="span2">

			<div class="control-group">										
				<label class="control-label" for="conta">Conta</label>
				<div class="controls">
					{{ Form::text('conta', NULL, array('class' => 'input-medium')) }}
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