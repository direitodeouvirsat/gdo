@if( Session::has('mensagem') )
	<p>
		<span class="label label-{{ Session::get('gravidade') }}">
			@if( Session::has('icone') )
				<i class="icon-white {{ Session::get('icone') }}"></i>
			@endif
			{{ Session::get('mensagem') }}
		</span>
	</p>
@endif