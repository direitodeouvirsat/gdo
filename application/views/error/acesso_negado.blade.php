<!doctype html>
<html>
<head>
    <title>GDO - Gestor Direito de Ouvir</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes"> 

    {{ HTML::style('css/bootstrap.min.css') }}
    {{ HTML::style('css/bootstrap-responsive.min.css') }}
    {{ HTML::style('http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600') }}
    {{ HTML::style('css/font-awesome.css') }}
    {{ HTML::style('css/base-admin.css') }}
    {{ HTML::style('css/base-admin-responsive.css') }}
	    
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
					
					<li class="">						
						<a href="javascript:history.back(-1)" class="">
							<i class="icon-chevron-left"></i>
							Voltar
						</a>
						
					</li>
				</ul>
				
			</div><!--/.nav-collapse -->	
	
		</div> <!-- /container -->
		
	</div> <!-- /navbar-inner -->
	
</div> <!-- /navbar -->



<div class="container">
	
	<div class="row">
		
		<div class="span12">
			
			<div class="error-container">
				<?php $messages = array('Hum...'); ?>
				<h1>{{ $messages[mt_rand(0, 0)]; }}</h1>
				
				<h2>Você não tem acesso a esta página</h2>
				
				<div class="error-details">
					Se você acha que algo esta errado, converse com seu líder e ele conversa com a gente ;)
				</div> <!-- /error-details -->
						
			</div> <!-- /error-container -->			
			
		</div> <!-- /span12 -->
		
	</div> <!-- /row -->
	
</div> <!-- /container -->

{{ HTML::script('js/bootstrap.js') }}

</body>
</html>