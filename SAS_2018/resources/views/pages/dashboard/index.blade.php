@extends('pages/layout/layout')
@section('content-sidebar')
    <ul class="sidebar-menu" data-widget="tree">
        <li class="active">
            <a href="{{ route('dashboard') }}">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    <span class="pull-right-container">
                <i class="pull-right"></i>
                </span>
            </a>
        </li>
        <li class=" }}">
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
        Dashboard
    </h1>
    <ol class="breadcrumb">
        <li class="active">Dashboard</li>
    </ol>
@endsection
@section('content')

@endsection
