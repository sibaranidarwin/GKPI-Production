<?php
$navbars = StaticVariable::$navbarPendeta;
?>
@extends('layouts.home5')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Statistik Kategorial')
@section('page_name', 'Statistik Kategorial')
@section('navbar_content')
    <div class="col-4 ms-auto">
        <input type="text" class="form-control" name="" id="">
    </div>
@endsection
@section('content')
<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
    <div class="col-12 mt-5 p-3">
        <div class="col-12 shadow-sm rounded mt-2 bg-white p-3">
             <div id="grafik_batang" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
        </div>
@endsection  

@section('grafik')
<script src="https://code.highcharts.com/highcharts.js"></script>
    <script type="text/javascript">

        Highcharts.chart('grafik_batang', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Statistik Jemaat Kategorial Mingguan'
            },
            subtitle: {
                text: 'Bulan Agustus'
            },
            xAxis: {
                categories: [
                    'Minggu I',
                    'Minggu II',
                    'Minggu III',
                    'Minggu IV',
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Jumlah'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y} Jemaat</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Sekolah Minggu',
                data: [148,258,136,11]

            }, {
                name: 'Minggu Sesi I',
                data: [120,230,126,10]

            }, {
                name: 'Minggu Sesi II',
                data: [108,208,106,53]

            }, {
                name: 'Sermon Jemaat',
                data: [118,218,116,23]

            },{
                name: 'Ina Kamis',
                data: [118,258,136,53]

            },{
                name: 'Partangian Sektor',
                data: [118,208,130,43]

            },{
                name: 'Ina Ester',
                data: [108,218,106,42]

            }
            ,{
                name: 'PP Remaja',
                data: [118,248,106,23]

            }
            ]
        });
    </script>
@endsection
