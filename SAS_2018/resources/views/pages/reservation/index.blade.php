@extends('pages/layout/layout')
@section('content-sidebar')
    <ul class="sidebar-menu" data-widget="tree">
        <li class="active">
            <a href="{{ route('reservation') }}">
                <i class="fa fa-dashboard"></i> <span>Reservations</span>
                <span class="pull-right-container">
                <i class="pull-right"></i>
                </span>
            </a>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-pie-chart"></i>
                <span>Maintenance</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="">
                    <a href="{{ route('staff') }}"><i class="fa fa-circle-o"></i> Staff</a>
                </li>
                <li class="">
                    <a href="{{ route('service') }}"><i class="fa fa-circle-o"></i> Service</a>
                </li>
                <li class="">
                    <a href="{{ route('package') }}"><i class="fa fa-circle-o"></i> Package</a>
                </li>
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-dashboard"></i> <span>Reports</span>
                <span class="pull-right-container">
                <i class="pull-right"></i>
                </span>
            </a>
        </li>
    </ul>
@endsection
@section('content-header')
    <h1>
        Reservations
    </h1>
    <ol class="breadcrumb">
        <li class="active">Reservations</li>
    </ol>
@endsection
@section('content')
    <div class="box">
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_1" data-toggle="tab">Today's Appointments</a></li>
                            <li><a href="#tab_2" data-toggle="tab">Pending Appointments</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            @foreach($appointment as $app)
                                                <?php
                                                    if ($app->appointment_date == date("Y-m-d")):
                                                ?>
                                                <div class="box-group" id="accordion">
                                                    <div class="panel box">
                                                        <div class="box-header with-border">
                                                            <h4 class="box-title">
                                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $app->appointment_id }}">
                                                                    {{ $app->customer_name }}
                                                                </a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapse{{ $app->appointment_id }}" class="panel-collapse collapse in">
                                                            <div class="box-body">
                                                                <div class="row">
                                                                    <?php
                                                                        $appPackage = [];
                                                                        $appService = [];
                                                                        $appStaff = [];
                                                                        foreach ($package as $packages) {
                                                                            if($packages->appointment_id == $app->appointment_id){
                                                                                array_push($appPackage, $packages->package_name);
                                                                            }
                                                                        }
                                                                        foreach ($service as $services) {
                                                                            if($services->appointment_id == $app->appointment_id){
                                                                                array_push($appService, $services->service_name);
                                                                            }
                                                                        }
                                                                        foreach ($staff as $staffs) {
                                                                            if($staffs->appointment_id == $app->appointment_id){
                                                                                array_push($appStaff, ($staffs->staff_firstname . " " . $staffs->staff_lastname));
                                                                            }
                                                                        }
                                                                    ?>
                                                                    <div class="col-md-3">
                                                                        <p>Customer Name: </p>
                                                                        <p>Contact Number: </p>
                                                                        <p>Email Address: </p>
                                                                        <p>Appoitment Date: </p>
                                                                        <p>Appoitment Time: </p>
                                                                        <p>Package(s) Availed: </p>
                                                                        <p>Services Availed: </p>
                                                                        <p>Staff Selected: </p>
                                                                    </div>
                                                                    <div class="col-md-9">
                                                                        <p>{{ $app->customer_name}}</p>
                                                                        <p>{{ $app->customer_contactnumber}}</p>
                                                                        <p>{{ $app->customer_email}}</p>
                                                                        <p>{{ $app->appointment_date}}</p>
                                                                        <p>{{ $app->appointment_time}}</p>
                                                                        <p>{{ implode(", ", $appPackage) }}</p>
                                                                        <p>{{ implode(", ", $appService) }}</p>
                                                                        <p>{{ implode(", ", $appStaff) }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif ?>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab_2">
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            @foreach($appointment as $app)
                                                <div class="box-group" id="accordion">
                                                    <div class="panel box">
                                                        <div class="box-header with-border">
                                                            <h4 class="box-title">
                                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $app->appointment_id }}">
                                                                    {{ $app->customer_name }}
                                                                </a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapse{{ $app->appointment_id }}" class="panel-collapse collapse in">
                                                            <div class="box-body">
                                                                <div class="row">
                                                                    <?php
                                                                        $appPackage = [];
                                                                        $appService = [];
                                                                        $appStaff = [];
                                                                        foreach ($package as $packages) {
                                                                            if($packages->appointment_id == $app->appointment_id){
                                                                                array_push($appPackage, $packages->package_name);
                                                                            }
                                                                        }
                                                                        foreach ($service as $services) {
                                                                            if($services->appointment_id == $app->appointment_id){
                                                                                array_push($appService, $services->service_name);
                                                                            }
                                                                        }
                                                                        foreach ($staff as $staffs) {
                                                                            if($staffs->appointment_id == $app->appointment_id){
                                                                                array_push($appStaff, ($staffs->staff_firstname . " " . $staffs->staff_lastname));
                                                                            }
                                                                        }
                                                                    ?>
                                                                    <div class="col-md-3">
                                                                        <p>Customer Name: </p>
                                                                        <p>Contact Number: </p>
                                                                        <p>Email Address: </p>
                                                                        <p>Appoitment Date: </p>
                                                                        <p>Appoitment Time: </p>
                                                                        <p>Package(s) Availed: </p>
                                                                        <p>Services Availed: </p>
                                                                        <p>Staff Selected: </p>
                                                                    </div>
                                                                    <div class="col-md-9">
                                                                        <p>{{ $app->customer_name}}</p>
                                                                        <p>{{ $app->customer_contactnumber}}</p>
                                                                        <p>{{ $app->customer_email}}</p>
                                                                        <p>{{ $app->appointment_date}}</p>
                                                                        <p>{{ $app->appointment_time}}</p>ghfgh
                                                                        <p>{{ implode(", ", $appPackage) }}</p>
                                                                        <p>{{ implode(", ", $appService) }}</p>
                                                                        <p>{{ implode(", ", $appStaff) }}</p>
                                                                    </div>uiu8
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
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
@endsection
