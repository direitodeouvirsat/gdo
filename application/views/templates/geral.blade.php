<!doctype html>
<html>
<head>
    <title>GDO - Gestor Direito de Ouvir</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    
    {{ HTML::style('css/bootstrap.min.css') }}
    {{ HTML::style('css/bootstrap-responsive.min.css') }}
    {{ HTML::style('css/font-awesome.css') }}
    {{ HTML::style('css/base-admin.css') }}
    {{ HTML::style('css/base-admin-responsive.css') }}
    {{ HTML::style('css/dashboard.css') }}
    {{ HTML::style('css/gmail.css') }}

  </head>

<body>

<div class="navbar navbar-fixed-top">
	
	<div class="navbar-inner">
		
		<div class="container">
			
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			
			<a class="brand" href="./">
				GDO - Gestor Direito de Ouvir				
			</a>		
			
			<div class="nav-collapse">
				<ul class="nav pull-right">
					<li class="dropdown">
						
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-cog"></i>
								<em style="font-size:15px;">Ajuda</em>
							<b class="caret"></b>
						</a>
						
						<ul class="dropdown-menu">
							<li><a href="javascript:;"><em style="font-size:14px;">Informar erro</em></a></li>
							<li class="divider"></li>
							<li><a href="javascript:;"><em style="font-size:14px;">Ajuda</em></a></li>
						</ul>
						
					</li>
			
					<li class="dropdown">
						
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-user"></i> 
								<em style="font-size:15px;">{{ ucwords(Auth::user()->usuario) }}</em>
							<b class="caret"></b>
						</a>
						
						<ul class="dropdown-menu">
							<li><a href="javascript:;"><em style="font-size:14px;">Meu perfil</em></a></li>
							<li><a href="javascript:;"><em style="font-size:14px;">Grupos</em></a></li>
							<li class="divider"></li>
							<li><a href="{{ URL::to_action('usuario@login') }}"><em style="font-size:15px;">Sair</em></a></li>
						</ul>
						
					</li>
				</ul>
			
				<form class="navbar-search pull-right">
					<input type="text" class="search-query" placeholder="O que você procura?">
				</form>
				
			</div><!--/.nav-collapse -->	
	
		</div> <!-- /container -->
		
	</div> <!-- /navbar-inner -->
	
</div> <!-- /navbar -->

<div class="subnavbar">

	<div class="subnavbar-inner">
	
		<div class="container">
			<ul class="mainnav">
				<li class="subnavbar-open-right">
					<a href="{{ URL::to_action('inicio') }}">
						<i class="icon icon-home"></i>
						<span><em style="font-size: 15px;">Início</em></span>
					</a>
				</li>
			@foreach(Session::get('lista_menu') as $key => $value)
				<li class="dropdown subnavbar-open-right">
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
						<?php
							switch ($key) {
								case 'Administração':
									$icone = 'star';
									break;
								case 'Configuração':
									$icone = 'cog';
									break;
								default:
									$icone = 'home';
									break;
							}
						?>
						<i class="icon icon-{{ $icone }}"></i>
						<span><em style="font-size: 15px;">{{ $key }}</em></span>
						<b class="caret"></b>
					</a>	
					<ul class="dropdown-menu">
						@foreach($value as $subitem)
						<li><a href="{{ URL::to_action($subitem['controller']) }}"><em style="font-size:14px;">{{ $subitem['descricao'] }}</em></a></li>
						@endforeach
					</ul>    				
				</li>
			@endforeach
			</ul>

		</div> <!-- /container -->
	
	</div> <!-- /subnavbar-inner -->

</div> <!-- /subnavbar -->


<div class="row">
    <div class="container">
		
		@yield('content')

	</div>
</div>

<!-- Rodape -->

<div class="footer">
	
	<div class="footer-inner">
		
		<div class="container">
			
			<div class="row">
				
    			<div class="span12">
    				<a href="http://www.direitodeouvir.com.br" target="_new">Direito de Ouvir</a> &copy <?php echo $data = date('Y') ?> - Todos os direitos reservados.
    			</div> <!-- /span12 -->
    			
    		</div> <!-- /row -->
    		
		</div> <!-- /container -->
		
	</div> <!-- /footer-inner -->
	
</div> <!-- /footer -->

{{ HTML::script('js/jquery-1.7.2.min.js') }}
{{ HTML::script('js/bootstrap.js') }}
{{ HTML::script('js/masked-input.js') }}
{{ HTML::script('js/jquery.form.js') }}
{{ HTML::script('js/geral.js') }}

</body>
</html>