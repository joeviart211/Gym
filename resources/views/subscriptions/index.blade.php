@extends('app')

@section('content')


    <div class="rightside bg-grey-100">
        <!-- BEGIN PAGE HEADING -->
        <div class="page-head bg-grey-100 padding-top-15 no-padding-bottom">
            @include('flash::message')
            <h1 class="page-title no-line-height">Suscripciones
                @permission(['manage-gymie','manage-subscriptions','crer suscripciones'])
                <a href="{{ action('SubscriptionsController@create') }}" class="page-head-btn btn-sm btn-primary active" role="button">Nuevo</a>
               
            </h1>
            @permission(['manage-gymie','pagehead-stats'])
            <h1 class="font-size-30 text-right color-blue-grey-600 animated fadeInDown total-count pull-right"><span data-toggle="counter" data-start="0"
                                                                                                                     data-from="0" data-to="{{ $count }}"
                                                                                                                     data-speed="600"
                                                                                                                     data-refresh-interval="10"></span>
                <small class="color-blue-grey-600 display-block margin-top-5 font-size-14">Total</small>
            </h1>
            @endpermission
            @endpermission
        </div>

        <div class="container-fluid">
         
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel no-border ">

                        <div class="panel-title bg-blue-grey-50">
                            <div class="panel-head font-size-15">

                                <div class="row">
                                    <div class="col-sm-12 no-padding">
                                        {!! Form::Open(['method' => 'GET']) !!}

                                        
                        <div class="panel-body bg-white">
                            @if($subscriptions->count() == 0)
                                <h4 class="text-center padding-top-15">Aun no hay nada </h4>
                            @else
                                <table id="subscriptions" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Member Code</th>
                                        <th>Member Name</th>
                                        <th>Plan Name</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Status</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <tr>

                                        @foreach ($subscriptions as $subscription)

                                            <td>
                                                <a href="{{ action('MembersController@show',['id' => $subscription->member->id]) }}">{{ $subscription->member->member_code}}</a>
                                            </td>
                                            <td>
                                                <a href="{{ action('MembersController@show',['id' => $subscription->member->id]) }}">{{ $subscription->member->name}}</a>
                                            </td>
                                            <td>{{ $subscription->plan_name}}</td>
                                            <td>{{ $subscription->start_date->format('Y-m-d')}}</td>
                                            <td>{{ $subscription->end_date->format('Y-m-d')}}</td>
                                            <td>
                                                <span class="{{ Utilities::getSubscriptionLabel ($subscription->status) }}">{{ Utilities::getSubscriptionStatus($subscription->status) }}</span>
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-info">Actions</button>
                                                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                        <span class="caret"></span>
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <ul class="dropdown-menu" role="menu">
                                                        <li>
                                                            @permission(['manage-gymie','manage-subscriptions','edit-subscription'])
                                                            <a href="{{ action('SubscriptionsController@edit',['id' => $subscription->id]) }}">
                                                                Edit details
                                                            </a>
                                                            @endpermission
                                                        </li>
                                                        @permission(['manage-gymie','manage-subscriptions','change-subscription'])
                                                        <li>
                                                            <a href="{{ action('SubscriptionsController@change',['id' => $subscription->id]) }}">
                                                                Upgrade/Downgrade
                                                            </a>
                                                        <li>
                                                            @endpermission
                                                            @permission(['manage-gymie','manage-subscriptions','delete-subscription'])
                                                            <a href="#" class="delete-record"
                                                               data-delete-url="{{ url('subscriptions/'.$subscription->id.'/delete') }}"
                                                               data-record-id="{{$subscription->id}}">
                                                                Delete subscription
                                                            </a>
                                                            @endpermission
                                                        </li>
                                                    </ul>
                                                </div>

                                            </td>

                                            </td>
                                    </tr>

                                    @endforeach

                                    </tbody>
                                </table>

                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="gymie_paging_info">
                                            <!-- TO DO -->
                                            Showing page {{ $subscriptions->currentPage() }} of {{ $subscriptions->lastPage() }}
                                        </div>
                                    </div>

                                    <div class="col-xs-6">
                                        <div class="gymie_paging pull-right">

                                            {!! str_replace('/?', '?', $subscriptions->appends(Input::all())->render()) !!}
                                        </div>
                                    </div>
                                </div>

                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('footer_script_init')
    <script type="text/javascript">
        $(document).ready(function () {
            gymie.deleterecord();
        });
    </script>
@stop