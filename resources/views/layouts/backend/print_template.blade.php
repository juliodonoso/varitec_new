<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ secure_asset('tim/img/apple-icon.png') }}" />
    <link rel="icon" type="image/png" href="{{ secure_asset('tim/img/favicon.png') }}" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Reservas Jebien</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="{{ secure_asset('tim/css/bootstrap.min.css') }}" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
{{-- <link href="{{ URL::asset('tim/css/material-dashboard.css') }}" rel="stylesheet" />
          CSS for Demo Purpose, don't include it in your project    
    <link href="{{ URL::asset('tim/css/demo.css') }}" rel="stylesheet" />  --}}
    @stack('css')
    <!--     Fonts and icons     -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>

</head>

<body>
    <div class="wrapper">

        <div class="main-panel">

            <div class="content">
                <div class="container-fluid" style="min-height: 450px;">

					@yield('content')
					
                </div>
            </div>
			

        </div>
    </div>

</body>

</html>