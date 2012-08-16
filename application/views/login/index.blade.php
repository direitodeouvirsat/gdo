@layout('templates.login')
@section('content')
<div class="content clearfix">

        {{ Form::open('login', 'post') }}
        
            <h1>Acesso ao sistema</h1>        
            
            <div class="login-fields">
                @include('templates.mensagem')
                <br />
                <div class="field">
                    {{ $errors->first('usuario', '<p><span class="label label-warning">:message</span></p>') }}
                    {{ Form::text('usuario', Input::old('usuario'), array('class'=>'login username-field', 'placeholder'=>'Usuário', 'autofocus'=>'true')) }}
                </div> <!-- /field -->
                
                <div class="field">
                    {{ $errors->first('senha', '<p><span class="label label-warning">:message</span></p>') }}
                    {{ Form::password('senha', array('class'=>'login password-field', 'placeholder'=>'Senha')) }}
                </div> <!-- /password -->
                
            </div> <!-- /login-fields -->
            
            <div class="login-actions">
                {{ Form::submit('Entrar', array('class'=>'button btn btn-warning btn-large')) }}
            </div> <!-- .actions -->
            
        {{ Form::close() }}
        
    </div> <!-- /content -->
<!-- Text Under Box -->
<div class="login-extra">
    Não possui um acesso ainda? <a href="{{ URL::to_action('login') }}">solicite aqui</a><br>
    Esqueci <a href="{{ URL::to_action('amnesia') }}">minha senha</a>
</div> <!-- /login-extra -->

@endsection