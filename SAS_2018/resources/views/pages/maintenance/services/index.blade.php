@extends('pages/layout/layout')
@section('content-sidebar')
    <ul class="sidebar-menu" data-widget="tree">
        <li class="">
            <a href="{{ route('dashboard') }}">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    <span class="pull-right-container">
                <i class="pull-right"></i>
                </span>
            </a>
        </li>
        <li class="">
            <a href="{{ route('reservation') }}">
                <i class="fa fa-dashboard"></i> <span>Reservations</span>
                <span class="pull-right-container">
                <i class="pull-right"></i>
                </span>
            </a>
        </li>
        <li class="treeview active">
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
                    <a href="{{ route('service') }}"><i class="fa fa-circle"></i> Service</a>
                </li>
                <li class="">
                    <a href="{{ route('package') }}"><i class="fa fa-circle-o"></i> Package</a>
                </li>
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-dashboard"></i> <span>Utilities</span>
                <span class="pull-right-container">
                <i class="pull-right"></i>
                </span>
            </a>
        </li>
    </ul>
@endsection
@section('content-header')
    <h1>
        Services
    </h1>
    <ol class="breadcrumb">
        <li class="active">Services</li>
    </ol>
@endsection
@section('content')
<div class="box">
    <div class="box-body">
        <div class="row">
            <div class="col-md-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab_1" data-toggle="tab">List</a></li>
                        <li><a href="#tab_2" data-toggle="tab">Types</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">
                            <div class="box-body">
                                <div class="card-header clearfix">
                                    <div class="pull-right action-bar">
                                        <div class="btn-group" role="group" aria-label="">
                                            <a class="btn btn-sm btn-outline-dark" onclick="addNewService();">
                                                <i class="fa fa-plus" aria-hidden="true"></i>&nbsp; New
                                            </a>
                                            <a class="btn btn-sm btn-outline-dark" href="#">
                                                <i class="fa fa-refresh" aria-hidden="true"></i>&nbsp; Refresh
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div><br>
                            <div class="box-body">
                                <table id="service_tbl" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Service ID</th>
                                                <th>Service Name</th>
                                                <th>Service Description</th>
                                                <th>Service Type</th>
                                                <th>Service Fee</th>
                                                <th>Status</th>
                                                <th width="50px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($service as $serviceData)
                                            <tr>
                                                <td>{{ $serviceData->service_id }}</td>
                                                <td>{{ $serviceData->service_name }}</td>
                                                <td>{{ $serviceData->service_desc }}</td>
                                                <td>{{ $serviceData->servicetype_name }}</td>
                                                <td>{{ $serviceData->service_price }}</td>
                                                <td>{{ $serviceData->status }}</td>
                                                <td>
                                                    <a class="btn" onclick="editService(this.name)" name="{{ $serviceData->service_id }}">
                                                        <i class="fa fa-pencil-square-o"></i>
                                                    </a>
                                                    <a class="btn" onclick="deleteService(this.name)" name="{{ $serviceData->service_id }}">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab_2">
                            <div class="box-body">
                                <div class="card-header clearfix">
                                    <div class="pull-right action-bar">
                                        <div class="btn-group" role="group" aria-label="">
                                            <a class="btn btn-sm btn-outline-dark" onclick="addNewServiceType()">
                                                <i class="fa fa-plus" aria-hidden="true"></i>&nbsp; New
                                            </a>
                                            <a class="btn btn-sm btn-outline-dark" href="#">
                                                <i class="fa fa-refresh" aria-hidden="true"></i>&nbsp; Refresh
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div><br>
                            <div class="box-body">
                                <table id="servicetype_tbl" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th width="100px;">Service Type ID</th>
                                            <th>Service Type Name</th>
                                            <th width="50px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($serviceType as $serviceTypeData)
                                            <tr>
                                                <td>{{ $serviceTypeData->servicetype_id }}</td>
                                                <td>{{ $serviceTypeData->servicetype_name }}</td>
                                                <td>
                                                    <a class="btn" name="{{ $serviceTypeData->servicetype_id }}" onclick="editServiceType(this.name)">
                                                        <i class="fa fa-pencil-square-o"></i>
                                                    </a>
                                                    <a class="btn" name="{{ $serviceTypeData->servicetype_id }}" onclick="deleteServiceType(this.name)">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
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
@include('/pages/maintenance/services/include_modals')
@endsection
@section('content-script')
    <script>
        $(function () {
        $('#service_tbl').DataTable({
          'paging'      : true,
          'lengthChange': false,
          'searching'   : true,
          'ordering'    : true,
          'info'        : true,
          'autoWidth'   : false
        });
        $('#servicetype_tbl').DataTable({
          'paging'      : true,
          'lengthChange': false,
          'searching'   : true,
          'ordering'    : true,
          'info'        : true,
          'autoWidth'   : false
        });
    })
    </script>
    <script>
        function addNewServiceType(){
            $('#new-service-type-modal').modal('show');
        };

        function addNewService(){
            $('#new-service-modal').modal('show');
        };

        function deleteService( id ){
            document.getElementById("inputServiceID").value = id;
            $('#delete-service-modal').modal('show');
        };

        function deleteServiceType( id ){
            document.getElementById("inputServiceTypeID").value = id;
            $('#delete-service-type-modal').modal('show');
        };

        function editServiceType( id ){
            $.ajax({
				type: "GET",
				url: '/API/maintenance/getSingleServiceType',
				data: {
					'serviceTypeID' : id
				},
				success: function ( data ) {
                    for( var i=0 ; i<data['serviceTypeData'].length; ++i ){
                        document.getElementById("inputServiceTypeIDEdit").value = data['serviceTypeData'][i]['servicetype_id'];
                        document.getElementById("inputServiceTypeNameEdit").value = data['serviceTypeData'][i]['servicetype_name'];
					}
                    $('#edit-service-type-modal').modal('show');
				},
				error: function (xhr, desc, err) {
					console.log(xhr);
					console.log(desc);
					console.log(err);
					}
				});
        };

        function editService( id ){
            $.ajax({
				type: "GET",
				url: '/API/maintenance/getSingleService',
				data: {
					'serviceID' : id
				},
				success: function ( data ) {
                    for( var i=0 ; i<data['serviceData'].length; ++i ){
                        document.getElementById("inputServiceIDEdit").value = data['serviceData'][i]['service_id'];
                        document.getElementById("inputServiceNameEdit").value = data['serviceData'][i]['service_name'];
                        document.getElementById("inputServiceDescEdit").value = data['serviceData'][i]['service_desc'];
                        document.getElementById("inputServiceFeeEdit").value = data['serviceData'][i]['service_price'];
					}
                    $('#edit-service-modal').modal('show');
				},
				error: function (xhr, desc, err) {
					console.log(xhr);
					console.log(desc);
					console.log(err);
					}
				});
        };
    </script>
@endsection
