@extends('pages/layout/layout')
@section('content-sidebar')
    <ul class="sidebar-menu" data-widget="tree">
        <li class="">
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
        <li class="active">
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
        Reports
    </h1>
@endsection
@section('content')
    <div class="box">
        <div class="box-body">
            <div class="card-header clearfix">
                <div class="pull-right action-bar">
                    <div class="btn-group" role="group" aria-label="">
                        <a class="btn btn-sm btn-outline-dark" onclick="printReport();">
                            <i class="fa fa-plus" aria-hidden="true"></i>&nbsp; Print
                        </a>
                        <a class="btn btn-sm btn-outline-dark"href="{{ route('report') }}">
                            <i class="fa fa-refresh" aria-hidden="true"></i>&nbsp; Refresh
                        </a>
                    </div>
                </div>
            </div>
        </div><br>
        <div class="box-body">
            <table id="appointmentTbl" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th hidden>ID</th>
                    <th>Customer Name</th>
                    <th>Email Address</th>
                    <th>Contact Number</th>
                    <th>Time</th>
                    <th>Date</th>
                    <th>Package</th>
                    <th>Service</th>
                    <th>Staff</th>
                    <th>Message</th>
                </tr>
            </thead>
            <tbody>
                @foreach($appointmentFinished as $app)
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
                    <tr>
                        <td hidden>{{ $app->appointment_id }}</td>
                        <td>{{ $app->customer_name }}</td>
                        <td>{{ $app->customer_email }}</td>
                        <td>{{ $app->customer_contactnumber }}</td>
                        <td>{{ $app->appointment_time }}</td>
                        <td>{{ $app->appointment_date }}</td>
                        <td>{{ implode(", ", $appPackage) }}</td>
                        <td>{{ implode(", ", $appService) }}</td>
                        <td>{{ implode(", ", $appStaff) }}</td>
                        <td>{{ $app->appointment_message }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
@endsection
@include('/pages/maintenance/packages/include_modals')
@section('content-script')
    <script>
        $(function () {
            $('#appointmentTbl').DataTable({
              'paging'      : true,
              'lengthChange': false,
              'searching'   : false,
              'ordering'    : false,
              'info'        : true,
              'autoWidth'   : false
            });

        })
    </script>
    <script>
        function printReport(){
            $.ajax({
                type: "GET",
                url:  "/API/getReport",
                success: function(data){
                    var frame1 = $('<iframe />');
                    frame1[0].name = "frame1";
                    frame1.css({ "position": "absolute", "top": "-1000000px" });
                    $("body").append(frame1);
                    var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
                    frameDoc.document.open();
                    frameDoc.document.write('<html><body> <div >');
                    frameDoc.document.write('<image src = "logo.png" align = "pullcenter" width = "130" height = "100" style ="padding-left:10px"­> ');
                    frameDoc.document.write('<p align = "Center">Margareth Catering Services </br>');
                    frameDoc.document.write('B4 L5 Ph7 JP Rizal St., New San Mateo Subd., Gitnangbayan I, San Mateo, Rizal </br>');
                    frameDoc.document.write('696-4528 | (+63) 928-297-2321 | (+63) 907-208-3331 </br>');
                    frameDoc.document.write('margarethcateringservices@gmail.com </p></br></br>');
                    frameDoc.document.write('<p align="right" > </p>');
                    frameDoc.document.write('<p align= "center" style ="font-weight:bold;font-size:16pt">Sales Report for the Month of </p>');
                    frameDoc.document.write('<table border="1" style="width:100%;">');
                    frameDoc.document.write('<tr>');
                    frameDoc.document.write('<th> Appointment ID </th>');
                    frameDoc.document.write('<th> Customer Name</th>') ;
                    frameDoc.document.write('<th> Contact Number</th>');
                    frameDoc.document.write('<th> Email Address </th>');
                    frameDoc.document.write('</tr>');
                    for (i = 0; i < data['appointmentFinished'].length; i++) {
                        frameDoc.document.write('<tr style ="text-align:center">');
                        frameDoc.document.write('<td>' +data['appointmentFinished'][i]['appointment_id']+ '</td>');
                        frameDoc.document.write('<td>' +data['appointmentFinished'][i]['customer_name']+ '</td>');
                        frameDoc.document.write('<td>' +data['appointmentFinished'][i]['customer_contactnumber']+ '</td>');
                        frameDoc.document.write('<td>' +data['appointmentFinished'][i]['customer_email']+ '</td>');
                        frameDoc.document.write('</tr>');
                    }
                    frameDoc.document.write('</table></br>')
                    frameDoc.document.write('</html>')
                    frameDoc.document.close();
                    setTimeout(function () {
                    window.frames["frame1"].focus();
                    window.frames["frame1"].print();
                    frame1.remove();
                    }, 500);
                },
                error: function(xhr){
                    alert($.parseJSON(xhr.responseText)['error']['message']);
                }
            });
        };
    </script>
@endsection
