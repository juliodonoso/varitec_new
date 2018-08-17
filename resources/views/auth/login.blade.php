<!doctype html>
<html lang="es">

<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
    
    <link rel="apple-touch-icon" sizes="76x76" href="{{ URL::asset('tim/img/apple-icon.png') }}" />
    <link rel="icon" type="image/png" href="{{ URL::asset('tim/img/favicon.png') }}" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Varitec</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="{{ URL::asset('tim/css/bootstrap.min.css') }}" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="{{ URL::asset('tim/css/material-dashboard.css?v=1.2.1') }}" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{ URL::asset('tim/css/demo.css') }}" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>

    @stack('css')
</head>

<body class="off-canvas-sidebar">
    <nav class="navbar navbar-primary navbar-transparent navbar-absolute">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Sistema Gestion Varitec</a>
            </div>
            <div class="collapse navbar-collapse">
                 <ul class="nav navbar-nav navbar-right">
                 
                    {{--
                    <li class="">
                        <a href="{{ route('register') }}">
                            <i class="material-icons">person_add</i> Registrarse
                        </a>
                    </li>
                     
                   <li class=" active ">
                        <a href="{{ route('login') }}">
                            <i class="material-icons">fingerprint</i> Ingresar
                        </a>
                    </li>
                    --}}
                </ul>
            </div>
        </div>
    </nav>

    <div class="wrapper wrapper-full-page">
        <div class="full-page login-page" filter-color="black" data-image="#">
            <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">

                            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}

                                <div class="card card-login" style="background: rgba(255,255,255, 0.8)">
                                    <div class="card-header text-center" data-background-color="green">
                                        <h3 class="card-title">Acceso Varitec</h3>

                                    </div>
                                    
                                    <h3 class=" text-center" style="color:black">
                                        Ingresar 
                                    </h3>
                                   
                                    @include('include.mensajes') 
                                    
                                    <div class="card-content">

                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">email</i>
                                            </span>
                                            <div class="form-group label-floating is-empty">
                                                <label class="control-label">Email</label>
                                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                                @if ($errors->has('email'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif                                                
                                            <span class="material-input"></span></div>
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">lock_outline</i>
                                            </span>
                                            <div class="form-group label-floating is-empty">
                                                <label class="control-label">Password</label>
                                                <input id="password" type="password" class="form-control" name="password" required>

                                                @if ($errors->has('password'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                @endif                                                
                                            <span class="material-input"></span></div>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} > Recordarme
                                            </label>
                                        </div>                                        
                                    </div>   

                                    <div class="footer text-center">
                                        <button type="submit" class="btn btn-blue btn-simple btn-wd btn-lg" style="color:black">Iniciar Sesión</button>
                                    </div>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="container">                  
                        <p class="copyright pull-right" style="color:red">
                            <a href="#" target="_blank" style="color:red">
                                &copy; Varitec 
                                <script>
                                    document.write(new Date().getFullYear())
                                </script>     
                            </a>                    
                        </p>                   
                </div>
            </footer>
        </div>
    </div>

<!--   Core JS Files   -->
<script src="{{ URL::asset('tim/js/jquery-3.2.1.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('tim/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('tim/js/material.min.js') }}" type="text/javascript"></script>
<!--  Charts Plugin -->
<script src="{{ URL::asset('tim/js/chartist.min.js') }}"></script>
<!--  Dynamic Elements plugin -->
<script src="{{ URL::asset('tim/js/arrive.min.js') }}"></script>
<!--  PerfectScrollbar Library -->
<script src="{{ URL::asset('tim/js/perfect-scrollbar.jquery.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
<!--  Notifications Plugin    -->
<script src="{{ URL::asset('tim/js/bootstrap-notify.js') }}"></script>
<!-- Material Dashboard javascript methods -->
<script src="{{ URL::asset('tim/js/material-dashboard.js?v=1.2.1') }}"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="{{ URL::asset('tim/js/demo.js') }}"></script>
<script src="{{ URL::asset('tim/js/jquery.sharrre.js') }}"></script>
<script type="text/javascript">

    $().ready(function() {
        //demo.checkFullPageBackgroundImage();

        setTimeout(function() {
            // after 1000 ms we add the class animated to the login/register card
            $('.card').removeClass('card-hidden');
        }, 700)
    });

</script>

</body>


@stack('js')

</html>

