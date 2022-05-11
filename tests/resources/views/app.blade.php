<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>

    <title>inicio</title>

    
    
    <link href="{{ URL::asset('assets/plugins/ionicons/css/ionicons.min.css') }}" rel="stylesheet"/>
   
    @yield('header_scripts')
</head>

<body class="fixed-leftside fixed-header">

<header class="hidden-print">
  
    <nav class="navbar navbar-static-top">
       
    </nav>
</header>


<div class="wrapper">
  
    <div class="leftside hidden-print">
        <div class="sidebar">
          
            <div class="nav-profile">
              
              
                <a href="{{url('auth/logout')}}" class="button"><i class="ion-log-out"></i></a>
            </div>
            
            <div class="title">Menú</div>
            <ul class="Menu">
                <li class="{{ Utilities::setActiveMenu('dashboard*') }}">
                    <a href="{{ action('DashboardController@index') }}">
                        <i class="ion-home"></i> <span>Inicio </span>
                    </a>
                </li>

               

        

     






</body>

</html>