<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>INICIAR SESION</title>

	<link href="img/favicon.144x144.png" rel="apple-touch-icon" type="image/png" sizes="144x144">
	<link href="img/favicon.114x114.png" rel="apple-touch-icon" type="image/png" sizes="114x114">
	<link href="img/favicon.72x72.png" rel="apple-touch-icon" type="image/png" sizes="72x72">
	<link href="img/favicon.57x57.png" rel="apple-touch-icon" type="image/png">
	<link href="img/favicon.png" rel="icon" type="image/png">
	<link href="img/favicon.ico" rel="shortcut icon">

    {!! Html::style('css/separate/pages/login.min.css') !!}
    {!! Html::style('css/lib/font-awesome/font-awesome.min.css') !!}
    {!! Html::style('css/lib/bootstrap/bootstrap.min.css') !!}
    {!! Html::style('css/main.css') !!}
</head>
<body>

    <div class="page-center">
        <div class="page-center-in">
            <div class="container-fluid">
                {!! Form::open(['id' => 'FrmLogin', 'class' => 'sign-box']) !!}
                    <div class="sign-avatar">
                        <img src="img/avatar-sign.png" alt="">
                    </div>
                    <header class="sign-title">INICIAR SESION</header>
                    <div class="form-group">
                        {!! Form::text('username',null,['class' => 'form-control', 'id' => 'username', 'placeholder' => 'Ingrese usuario']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::password('password',['class' => 'form-control', 'id' => 'password', 'placeholder' => 'Contraseña']) !!}
                    </div>
                    <button type="submit" class="btn btn-rounded">ENTRAR</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    {!! Html::script('js/lib/jquery/jquery.min.js') !!}
    {!! Html::script('js/lib/tether/tether.min.js') !!}
    {!! Html::script('js/lib/bootstrap/bootstrap.min.js') !!}
    {!! Html::script('js/plugins.js') !!}
    {!! Html::script('js/lib/match-height/jquery.matchHeight.min.js') !!}
    {!! Html::script('js/lib/jquery-validation/jquery.validate.js') !!}
    <script>
        $("#FrmLogin").validate({
            rules : {
                username : { required : true },
                password : { required : true }
            },
            messages :
            {
                username : "Ingrese Usuario",
                password : "Ingrese Contraseña"
            },
            submitHandler : function(form)
            {
                var data = $("#FrmLogin").serialize();
                $.ajax({
                    type    : "post",
                    url     : "authenticate",
                    data    : data,
                    cache   : false,
                    success : function(echo)
                    {
                        if (echo == 1)
                        {
                            window.location = "/";
                        }else 
                        {
                            $("#error").html("Usuario y Contraseña incorrecto").show();
                        }
                    }
                });
            }
        });
    </script>
    <script>
        $(function() {
            $('.page-center').matchHeight({
                target: $('html')
            });

            $(window).resize(function(){
                setTimeout(function(){
                    $('.page-center').matchHeight({ remove: true });
                    $('.page-center').matchHeight({
                        target: $('html')
                    });
                },100);
            });
        });
    </script>
    {!! Html::script('js/app.js') !!}
</body>
</html>