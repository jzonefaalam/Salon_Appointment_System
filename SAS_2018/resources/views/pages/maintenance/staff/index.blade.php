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
                    <th>Staff Image</th>
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
                    <td><img src="{{ asset('images/' . $staffData->staff_image) }}"  style="width:150px;height:100px;" /></td>
                    <td>{{ $staffData->staff_id }}</td>
                    <td>{{ $staffData->staff_firstname }} {{ $staffData->staff_middlename }}  {{ $staffData->staff_lastname }}</td>
                    <td>{{ $staffData->staff_description }}</td>
                    <td>{{ $staffData->staff_birthdate }}</td>
                    <td>{{ $staffData->staff_gender }}</td>
                    <td>{{ $staffData->status }}</td>
                    <td>
                        <a class="btn" onclick="editStaff(this.name)" name="{{ $staffData->staff_id }}">
                            <i class="fa fa-pencil-square-o"></i>
                        </a>
                        <a class="btn" onclick="deleteStaff(this.name)" name="{{ $staffData->staff_id }}">
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
@include('/pages/maintenance/staff/include_modals')
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

            $('#inputStaffBDate').datepicker({
              autoclose: true
            });

            $('#inputStaffBDateEdit').datepicker({
              autoclose: true
            });
        })
    </script>
    <script>
        function addNewStaff(){
            $('#new-staff-modal').modal('show');
        };

        function deleteStaff( id ){
            document.getElementById("inputStaffID").value = id;
            $('#delete-staff-modal').modal('show');
        };

        function editStaff( id ){
            $.ajax({
				type: "GET",
				url: '/API/maintenance/getSingleStaff',
				data: {
					'staffID' : id
				},
				success: function ( data ) {
                    for( var i=0 ; i<data['staffData'].length; ++i ){
                        document.getElementById("inputStaffIDEdit").value = data['staffData'][i]['staff_id'];
                        document.getElementById("inputStaffFNameEdit").value = data['staffData'][i]['staff_firstname'];
                        document.getElementById("inputStaffMnameEdit").value = data['staffData'][i]['staff_middlename'];
                        document.getElementById("inputStaffLNameEdit").value = data['staffData'][i]['staff_lastname'];
                        document.getElementById("inputStaffDescEdit").value = data['staffData'][i]['staff_description'];
                        document.getElementById("inputStaffBDateEdit").value = data['staffData'][i]['staff_birthdate'];
					}
                    $('#edit-staff-modal').modal('show');
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
