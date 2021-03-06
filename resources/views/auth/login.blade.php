<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>

    <title>Gimnasio de Dante</title>

   
    <link href="{{ URL::asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet"/>
    <link href="{{ URL::asset('assets/plugins/ionicons/css/ionicons.min.css') }}" rel="stylesheet"/>
    <link href="{{ URL::asset('assets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet"/>

</head>
<body class="auth-page height-auto bg-grey-600">
<div class="wrapper animated fadeInDown">
    <div class="panel overflow-hidden">
        <div class="bg-grey-900 padding-40 no-margin-bottom font-size-20 color-white text-center text-uppercase">
            <img src="{{ asset('assets/img/web/logo.png') }}">
        </div>
        @if (count($errors) > 0)
            <div class="alert alert-danger">
              Error, Contraseña o Correo equivocado<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form id="loginform" method="post" action="{{ url('/auth/login') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
            <div class="box-body padding-md">

                <div class="form-group">
                    <input type="text" name="email" class="form-control input-lg" placeholder="Correo"/>
                </div>

                <div class="form-group">
                    <input type="password" name="password" class="form-control input-lg" placeholder="Contraseña"/>
                </div>


                <button type="submit" class="btn btn-dark bg-light-green-500 padding-10 btn-block color-white"><i class="ion-log-in"></i> Ingresar </button>
            </div>
        </form>


    </div>
</div>


<script src="{{ URL::asset('assets/plugins/bootstrapValidator/bootstrapValidator.min.js') }}" type="text/javascript"></script>

<
<script src="{{ URL::asset('assets/js/login.js') }}" type="text/javascript"></script>


<script src="{{ URL::asset('assets/js/gymie.js') }}" type="text/javascript"></script>
</body>
</html>