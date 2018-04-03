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
        <li class="">
            <a href="{{ route('report') }}">
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
                            <li><a href="#tab_3" data-toggle="tab">Finished Appointments</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table id="todayTbl" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>List</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($appointmentToday as $app)
                                                        <tr>
                                                            <td>
                                                                <div class="box-group" id="accordion">
                                                                    <div class="panel box">
                                                                        <div class="box-header with-border">
                                                                            <h4 class="box-title">
                                                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $app->appointment_id }}">
                                                                                    {{ $app->customer_name }} || {{ $app->appointment_date }}
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
                                                                                        <p>Personal Message</p>
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <p>{{ $app->customer_name}}</p>
                                                                                        <p>{{ $app->customer_contactnumber}}</p>
                                                                                        <p>{{ $app->customer_email}}</p>
                                                                                        <p>{{ $app->appointment_date}}</p>
                                                                                        <p>{{ $app->appointment_time}}</p>
                                                                                        <p>
                                                                                            <?php
                                                                                                if(empty($appPackage)){
                                                                                                    echo "No Package Selected";
                                                                                                }
                                                                                                else{
                                                                                                    echo implode(",", $appPackage);
                                                                                                }
                                                                                            ?>
                                                                                        </p>
                                                                                        <p>{{ implode(", ", $appService) }}</p>
                                                                                        <p>{{ implode(", ", $appStaff) }}</p>
                                                                                        <p>{{ $app->appointment_message}}</p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab_2">
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table id="pendingTbl" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>List</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($appointmentPending as $app)
                                                        <tr>
                                                            <td>
                                                                <div class="box-group" id="accordion">
                                                                    <div class="panel box">
                                                                        <div class="box-header with-border">
                                                                            <h4 class="box-title">
                                                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $app->appointment_id }}">
                                                                                    {{ $app->customer_name }} | {{ $app->appointment_date }}
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
                                                                                        <p>Personal Message</p>
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <p>{{ $app->customer_name}}</p>
                                                                                        <p>{{ $app->customer_contactnumber}}</p>
                                                                                        <p>{{ $app->customer_email}}</p>
                                                                                        <p>{{ $app->appointment_date}}</p>
                                                                                        <p>{{ $app->appointment_time}}</p>
                                                                                        <p>
                                                                                            <?php
                                                                                                if(empty($appPackage)){
                                                                                                    echo "No Package Selected";
                                                                                                }
                                                                                                else{
                                                                                                    echo implode(",", $appPackage);
                                                                                                }
                                                                                            ?>
                                                                                        </p>
                                                                                        <p>{{ implode(", ", $appService) }}</p>
                                                                                        <p>{{ implode(", ", $appStaff) }}</p>
                                                                                        <p>{{ $app->appointment_message}}</p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab_3">
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table id="finishedTbl" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>List</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($appointmentFinished as $app)
                                                        <tr>
                                                            <td>
                                                                <div class="box-group" id="accordion">
                                                                    <div class="panel box">
                                                                        <div class="box-header with-border">
                                                                            <h4 class="box-title">
                                                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $app->appointment_id }}">
                                                                                    {{ $app->customer_name }} | {{ $app->appointment_date }}
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
                                                                                        <p>Personal Message</p>
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <p>{{ $app->customer_name}}</p>
                                                                                        <p>{{ $app->customer_contactnumber}}</p>
                                                                                        <p>{{ $app->customer_email}}</p>
                                                                                        <p>{{ $app->appointment_date}}</p>
                                                                                        <p>{{ $app->appointment_time}}</p>
                                                                                        <p>
                                                                                            <?php
                                                                                                if(empty($appPackage)){
                                                                                                    echo "No Package Selected";
                                                                                                }
                                                                                                else{
                                                                                                    echo implode(",", $appPackage);
                                                                                                }
                                                                                            ?>
                                                                                        </p>
                                                                                        <p>{{ implode(", ", $appService) }}</p>
                                                                                        <p>{{ implode(", ", $appStaff) }}</p>
                                                                                        <p>{{ $app->appointment_message}}</p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
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
@section('content-script')
    <script>
        $(function () {
            $('#pendingTbl').DataTable({
              'paging'      : true,
              'lengthChange': false,
              'searching'   : false,
              'ordering'    : false,
              'info'        : true,
              'autoWidth'   : false,
              "iDisplayLength": 5
            });

            $('#todayTbl').DataTable({
              'paging'      : true,
              'lengthChange': false,
              'searching'   : false,
              'ordering'    : false,
              'info'        : true,
              'autoWidth'   : false,
              "iDisplayLength": 5
            });

            $('#finishedTbl').DataTable({
              'paging'      : true,
              'lengthChange': false,
              'searching'   : false,
              'ordering'    : false,
              'info'        : true,
              'autoWidth'   : false,
              "iDisplayLength": 5
            });

        })
    </script>
@endsection
