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
                    <a class="btn" id="deleteServiceBtn();">
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
@endsection
