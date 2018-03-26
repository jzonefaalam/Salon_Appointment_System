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
                    <th>Package Image</th>
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
                    <td><img src="{{ asset('images/' . $packageData->package_image) }}"  style="width:150px;height:100px;" /></td>
                    <td>{{ $packageData->package_id }}</td>
                    <td>{{ $packageData->package_name }}</td>
                    <td>{{ $packageData->package_description }}</td>
                    <td>{{ $packageData->package_price }}</td>
                    <?php
                        $serviceInclusions = [];
                        foreach ($inclusions as $inclusion) {
                            if(($inclusion->package_id) == ($packageData->package_id)){
                                foreach ($service as $serviceData) {
                                    if(($serviceData->service_id)==($inclusion->service_id)){
                                        array_push($serviceInclusions, $serviceData->service_name);
                                    }
                                }
                            }
                        }
                    ?>
                    <td>{{ implode(", ", $serviceInclusions) }}</td>
                    <td>{{ $packageData->status }}</td>
                    <td>
                        <a class="btn" onclick="editPackage(this.name)" name="{{ $packageData->package_id }}">
                            <i class="fa fa-pencil-square-o"></i>
                        </a>
                        <a class="btn" onclick="deletePackage(this.name)" name="{{ $packageData->package_id }}">
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

        function deletePackage( id ){
            document.getElementById("inputPackageID").value = id;
            $('#delete-package-modal').modal('show');
        };

        function editPackage( id ){
            $.ajax({
				type: "GET",
				url: '/API/maintenance/getSinglePackage',
				data: {
					'packageID' : id
				},
				success: function ( data ) {
                    for( var i=0 ; i<data['packageData'].length; ++i ){
                        document.getElementById("inputPackageIDEdit").value = data['packageData'][i]['package_id'];
                        document.getElementById("inputPackageNameEdit").value = data['packageData'][i]['package_name'];
                        document.getElementById("inputPackageDescEdit").value = data['packageData'][i]['package_description'];
                        document.getElementById("inputPackagePriceEdit").value = data['packageData'][i]['package_price'];
					}
                    $('#edit-package-modal').modal('show');
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
