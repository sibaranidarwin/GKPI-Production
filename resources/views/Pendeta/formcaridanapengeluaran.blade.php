<?php
$navbars = StaticVariable::$navbarPendeta;
?>
@extends('layouts.home')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Data Keuangan')
@section('page_name', 'Cari Dana Pengeluaran')
@section('navbar_content')

@endsection
@section('content')
    @include('components.formcaridanapengeluaran')
@endsection