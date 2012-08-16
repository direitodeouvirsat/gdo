<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>GDO - Gestor Direito de Ouvir</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes"> 
    
    {{ HTML::style('css/bootstrap.min.css') }}
    {{ HTML::style('css/bootstrap-responsive.min.css') }}
    {{ HTML::style('css/font-awesome.css') }}
    {{ HTML::style('http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600') }}
    {{ HTML::style('css/base-admin.css') }}
    {{ HTML::style('css/signin.css') }}

</head>

<body>
        <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <a class="brand" href="./">
                    GDO - Gestor Direito de Ouvir
                </a>    
            </div> <!-- /container -->
        </div> <!-- /navbar-inner -->
    </div> <!-- /navbar -->
<div class="account-container">
@yield('content')
</div> <!-- /account-container -->
</body>
    {{ HTML::script('js/jquery-1.7.2.min.js') }}
    {{ HTML::script('js/bootstrap.js') }}
    {{ HTML::script('js/signin.js') }}
</html>