<?php
    $navbars = StaticVariable::$navbartatausaha;
?>
<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
@extends('layouts.home')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Data Jemaat Perminggu')
@section('page_name', "Data Jemaat Perminggu")
@section('content')
    @include("components.formdataperminggu")
    @include('sweetalert::alert')
@endsection