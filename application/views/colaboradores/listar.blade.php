@layout('templates.geral')
@section('content')
    
    <div class="span12">

		<div class="widget widget-table action-table">
							
			<div class="widget-header">
				<i class="icon-th-list"></i>
				<h3>Relação de Colaboradores</h3>
				<a href="{{ URL::to_action('colaborador@novo') }}" class="btn btn-info">Novo</a>
			</div> <!-- /widget-header -->
			
			<div class="widget-content">
				
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>Nome</th>
							<th>E-mail</th>
							<th>Telefone</th>
							<th>Status</th>
							<th class="td-actions"></th>
						</tr>
					</thead>
					<tbody>
						@if( isset($colaboradores) )
							@foreach( $colaboradores as $colaborador )
							<tr>
								<td>{{ $colaborador->nome }}</td>
								<td>ti@direitodeouvir.com.br</td>
								<td>(16) 3722-4970</td>
								<td>{{ $colaborador->status }}</td>
								<td class="td-actions">
									<a href="javascript:;" class="btn btn-small btn-warning">
										<i class="btn-icon-only icon-pencil" title="editar"></i>										
									</a>
									
									<a href="javascript:;" class="btn btn-small">
										<i class="btn-icon-only icon-remove" title="excluir"></i>										
									</a>
								</td>
							</tr>
							@endforeach
						@endif
						</tbody>
					</table>
				
			</div> <!-- /widget-content -->
		
		</div> <!-- /widget -->

	</div>

@endsection