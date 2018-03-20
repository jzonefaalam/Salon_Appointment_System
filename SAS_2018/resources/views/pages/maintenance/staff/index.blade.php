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
                    <a href="{{ route('staff') }}"><i class="fa fa-circle"></i> Staff</a>
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
        Staff
    </h1>
    <ol class="breadcrumb">
        <li class="active">Staff</li>
    </ol>
@endsection
@section('content')
    <div class="box">
        <div class="box-body">
            <div class="card-header clearfix">
                <div class="pull-right action-bar">
                    <div class="btn-group" role="group" aria-label="">
                        <a class="btn btn-sm btn-outline-dark" onclick="addNewStaff();">
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
            <table id="staff_tbl" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Staff ID</th>
                    <th>Staff Name</th>
                    <th>Staff Description</th>
                    <th>Staff Birth Date</th>
                    <th>Staff Gender</th>
                    <th>Status</th>
                    <th width="50px;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($staff as $staffData)
                <tr>
                    <td>{{ $staffData->staff_id }}</td>
                    <td>{{ $staffData->staff_firstname }} {{ $staffData->staff_middlename }}  {{ $staffData->staff_lastname }}</td>
                    <td>{{ $staffData->staff_description }}</td>
                    <td>{{ $staffData->staff_birthdate }}</td>
                    <td>{{ $staffData->staff_gender }}</td>
                    <td>{{ $staffData->status }}</td>
                    <td>
                        <a class="btn" id="deleteServiceBtn();">
                            <i class="fa fa-pencil-square-o"></i>
                        </a>
                        <a class="btn" onclick="deleteService(this.name)" name="{{ $staffData->staff_id }}">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
@endsection
@section('content-script')
    <script>
        $(function () {
        $('#staff_tbl').DataTable({
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
        function addNewStaff(){
            $('#new-staff-modal').modal('show');
        };

        // function deleteService( id ){
        //     document.getElementById("inputServiceID").value = id;
        //     $('#delete-service-modal').modal('show');
        // };
        //
        // function deleteServiceType( id ){
        //     document.getElementById("inputServiceTypeID").value = id;
        //     $('#delete-service-type-modal').modal('show');
        // };
        //
        // function editServiceType( id ){
        //     $.ajax({
		// 		type: "GET",
		// 		url: '/API/maintenance/getSingleServiceType',
		// 		data: {
		// 			'serviceTypeID' : id
		// 		},
		// 		success: function ( data ) {
        //             for( var i=0 ; i<data['serviceTypeData'].length; ++i ){
        //                 document.getElementById("inputServiceTypeIDEdit").value = data['serviceTypeData'][i]['servicetype_id'];
        //                 document.getElementById("inputServiceTypeNameEdit").value = data['serviceTypeData'][i]['servicetype_name'];
		// 			}
        //             $('#edit-service-type-modal').modal('show');
		// 		},
		// 		error: function (xhr, desc, err) {
		// 			console.log(xhr);
		// 			console.log(desc);
		// 			console.log(err);
		// 			}
		// 		});
        // };
        //
        // function editService( id ){
        //     $.ajax({
		// 		type: "GET",
		// 		url: '/API/maintenance/getSingleService',
		// 		data: {
		// 			'serviceID' : id
		// 		},
		// 		success: function ( data ) {
        //             for( var i=0 ; i<data['serviceData'].length; ++i ){
        //                 document.getElementById("inputServiceIDEdit").value = data['serviceData'][i]['service_id'];
        //                 document.getElementById("inputServiceNameEdit").value = data['serviceData'][i]['service_name'];
        //                 document.getElementById("inputServiceDescEdit").value = data['serviceData'][i]['service_desc'];
        //                 document.getElementById("inputServiceFeeEdit").value = data['serviceData'][i]['service_price'];
		// 			}
        //             $('#edit-service-modal').modal('show');
		// 		},
		// 		error: function (xhr, desc, err) {
		// 			console.log(xhr);
		// 			console.log(desc);
		// 			console.log(err);
		// 			}
		// 		});
        // };
    </script>
@endsection
