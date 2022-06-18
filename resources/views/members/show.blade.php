@extends('app')

@section('content')
    <?php use Carbon\Carbon; ?>

    <div class="rightside bg-grey-100">
        <div class="page-head bg-grey-100 padding-top-15 no-padding-bottom">
            @include('flash::message')
        </div>
        <div class="container-fluid">

            <div class="row"><!-- Main row -->
                <div class="col-md-12"><!-- Main Col -->
                    <div class="panel no-border ">
                        <div class="panel-title">
                            <div class="panel-head font-size-20">Detalles</div>
                            <div class="pull-right no-margin">
                                

                               
                            <button class="btn btn-danger" onclick="window.location='{{ url("members/delete/$member->id") }}'" >
                                    <span>Borrar Listado de pagos</span>
                                </button>
                                <button class="btn btn-danger" onclick="window.location='{{ url("downloads/$member->id") }}'" >
                                    <span>Descargar recomendación</span>
                                </button>
                                
                            </div>

                                

                                
                                

                        <div class="panel-body">
                            <div class="row">               
                                <div class="col-sm-8">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <!-- Spacer -->
                                            <div class="row visible-md visible-lg">
                                                <div class="col-sm-4">
                                                    <label>&nbsp;</label>
                                                </div>
                                            </div>
                                            <?php
                                            $images = $member->getMedia('profile');
                                            $profileImage = ($images->isEmpty() ? 'https://placeholdit.imgix.net/~text?txtsize=22&txt=NA&w=200&h=180' : url($images[0]->getUrl()));
                                            ?>
                                            <img class="AutoFitResponsive" src="{{ $profileImage }}"/>
                                        </div>


                                        <div class="col-sm-8">            <!-- Outer Row Start -->

                                            <!-- Spacer -->
                                            <div class="row visible-md visible-lg">
                                                <div class="col-sm-4">
                                                    <label>&nbsp;</label>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label>Nombre</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <span class="show-data">{{$member->name}}</span>
                                                </div>
                                            </div>

                                            <hr class="margin-top-0 margin-bottom-10">

                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label>Codigo</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <span class="show-data">{{$member->member_code}}</span>
                                                </div>
                                            </div>
                                            <hr class="margin-top-0 margin-bottom-10">

                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label>Fecha de nacimiento </label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <span class="show-data">{{$member->DOB}}</span>
                                                </div>
                                            </div>
                                            <hr class="margin-top-0 margin-bottom-10">
                                            
                                            <hr class="margin-top-0 margin-bottom-10">

                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label>Telefono</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <span class="show-data">{{$member->contact}}</span>
                                                </div>
                                            </div>

                                            <hr class="margin-top-0 margin-bottom-10">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label>Correo </label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <span class="show-data">{{$member->email}}</span>
                                                </div>
                                            </div>

                                            <hr class="margin-top-0 margin-bottom-10">
                                            
                                            <hr class="margin-top-0 margin-bottom-10">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label>Contacto de emergenciat</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <span class="show-data">{{$member->emergency_contact}}</span>
                                                </div>
                                            </div>


                                        </div>  
                                    </div>
                                </div>   

                                <div class="col-sm-4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="panel bg-grey-50">
                                                <div class="panel-title bg-transparent">
                                                    <div class="panel-head"><strong><span class="fa-stack">
							  <i class="fa fa-circle-thin fa-stack-2x"></i>
							  <i class="fa fa-ellipsis-h fa-stack-1x"></i>
							
                                                </div>
                                                <div class="panel-body">

                                                    <div class="row">
                                                        <?php
                                                        $subscriptions = $member->subscriptions;
                                                        $plansArray = array();
                                                        foreach ($subscriptions as $subscription) {
                                                            $plansArray[] = $subscription->plan->plan_name;
                                                        }
                                                        ?>
                                                        <div class="col-sm-4">
                                                            <label>Plan </label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <span class="show-data">{{implode(",",$plansArray)}}</span>
                                                        </div>
                                                    </div>
                                                    <hr class="margin-top-0 margin-bottom-10">

                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label>Status</label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <span class="show-data">{{Utilities::getStatusValue ($member->status)}}</span>
                                                        </div>
                                                    </div>
                                                    <hr class="margin-top-0 margin-bottom-10">
                                                    
                                                    <hr class="margin-top-0 margin-bottom-10">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label>Comprobante de identidad</label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <span class="show-data">{{$member->proof_name}}</span>
                                                        </div>
                                                    </div>
                                                    <hr class="margin-top-0 margin-bottom-10">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label>Domicilio </label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <span class="show-data">{{$member->address}}</span>
                                                        </div>
                                                    </div>
                                                    <hr class="margin-top-0 margin-bottom-10">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label>Problemas de salud</label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <span class="show-data">{{$member->health_issues}}</span>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>  
                        </div>
                    </div>
                </div>
            </div>

            
@stop