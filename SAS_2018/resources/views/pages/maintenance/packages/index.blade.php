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
                    <a href="{{ route('service') }}"><i class="fa fa-circle-o"></i> Service</a>
                </li>
                <li class="">
                    <a href="{{ route('package') }}"><i class="fa fa-circle"></i> Package</a>
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
        Packages
    </h1>
    <ol class="breadcrumb">
        <li class="active">Packages</li>
    </ol>
@endsection
@section('content')
    <div class="box">
        <div class="box-body">
            <div class="card-header clearfix">
                <div class="pull-right action-bar">
                    <div class="btn-group" role="group" aria-label="">
                        <a class="btn btn-sm btn-outline-dark" onclick="addNewPackage();">
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
            <table id="package_tbl" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Package ID</th>
                    <th>Package Name</th>
                    <th>Package Description</th>
                    <th>Package Price</th>
                    <th>Package Inclusion</th>
                    <th>Status</th>
                    <th width="50px;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($package as $packageData)
                <tr>
                    <td>{{ $packageData->package_id }}</td>
                    <td>{{ $packageData->package_name }}</td>
                    <td>{{ $packageData->package_description }}</td>
                    <td>{{ $packageData->package_price }}</td>
                    <td>WIP</td>
                    <td>{{ $packageData->status }}</td>
                    <td>
                        <a class="btn" onclick="editStaff(this.name)" name="{{ $packageData->package_id }}">
                            <i class="fa fa-pencil-square-o"></i>
                        </a>
                        <a class="btn" onclick="deleteStaff(this.name)" name="{{ $packageData->package_id }}">
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
@include('/pages/maintenance/packages/include_modals')
@section('content-script')
    <script>
        $(function () {
            $('#package_tbl').DataTable({
              'paging'      : true,
              'lengthChange': false,
              'searching'   : true,
              'ordering'    : true,
              'info'        : true,
              'autoWidth'   : false
            });

            $('.select2').select2();
        })
    </script>
    <script>
        function addNewPackage(){
            $('#new-package-modal').modal('show');
        };

        function submitNewPackage(){
			var services = $('#inputPackageInclusion').val();
        };
        //
        // function deleteStaff( id ){
        //     document.getElementById("inputStaffID").value = id;
        //     $('#delete-staff-modal').modal('show');
        // };
        //
        // function editStaff( id ){
        //     $.ajax({
		// 		type: "GET",
		// 		url: '/API/maintenance/getSingleStaff',
		// 		data: {
		// 			'staffID' : id
		// 		},
		// 		success: function ( data ) {
        //             for( var i=0 ; i<data['staffData'].length; ++i ){
        //                 document.getElementById("inputStaffIDEdit").value = data['staffData'][i]['staff_id'];
        //                 document.getElementById("inputStaffFNameEdit").value = data['staffData'][i]['staff_firstname'];
        //                 document.getElementById("inputStaffMnameEdit").value = data['staffData'][i]['staff_middlename'];
        //                 document.getElementById("inputStaffLNameEdit").value = data['staffData'][i]['staff_lastname'];
        //                 document.getElementById("inputStaffDescEdit").value = data['staffData'][i]['staff_description'];
        //                 document.getElementById("inputStaffBDateEdit").value = data['staffData'][i]['staff_birthdate'];
		// 			}
        //             $('#edit-staff-modal').modal('show');
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
