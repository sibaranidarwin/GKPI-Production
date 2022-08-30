<?php
$navbars = StaticVariable::$navbarSekretaris;
?>
@extends('layouts.home3')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Login')
@section('page_name', 'Cari Laporan Mingguan')
@section('navbar_content')

@endsection
@section('content')
<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" /> 
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
<div class="col-12 shadow-sm rounded mt-3 bg-white p-3">
        
        <div class="col-12 mt-5">
            <div class="table-responsive-sm">
            <table class="table table-light table-borderless">
                    <form class="mt-3" action="" method="GET" enctype="multipart/form-data">
                        <div class="form-group col-12 col-md-6 mt-3">
                            <label for="month">Masukkan Bulan dan Tahun Laporan Mingguan</label>
                            <input type="month" name="month" id="month" class="form-control">
                        </div>
                        <div class="col-12 col-md-6 mt-2">
                            <button type="submit" class="btn btn-success">
                                Cari
                            </button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                     </form>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection