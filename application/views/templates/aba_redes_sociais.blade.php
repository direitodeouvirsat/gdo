<!-- REDES SOCIAIS -->
<div class="tab-pane" id="social">

	<div class="row">

		<div class="span2">

			<div class="control-group">
				<label class="control-label" for="rede_social">Rede Social</label>
				<div class="controls">
					{{ Form::select('rede_social', array('E-mail' => 'E-mail', 'Skype' => 'Skype', 'Facebook' => 'Facebook', 'Orkut' => 'Orkut', 'LinkedIn' => 'LinkedIn', 'Google +' => 'Google +', 'Gtalk' => 'Gtalk'), NULL, array('class' => 'span2')) }}
				</div>				
			</div>

		</div>

		<div class="span3">

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

</div>