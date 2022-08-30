@extends('FE.template.header')
@section('title', 'Data Gereja')

@section('content')
<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet"/>
<link rel="stylesheet" href="{{ asset('/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('/css/footer.css') }}">

<style type="text/css">
    .my-custom-scrollbar {
position: relative;
height: 500px;
overflow: auto;
}
.table-wrapper-scroll-y {
display: block;
}
</style> 
<div class="col-12 shadow-sm rounded mt-3 bg-white p-3">

<div class="mt-3" id="sekolah_minggu"></div>
<div class="mt-3" id="minggu_sesiI"></div>
<div class="mt-3" id="minggu_sesiII"></div>
<div class="mt-3" id="sermon_jemaat"></div>
<div class="mt-3" id="ina_kamis"></div>
<div class="mt-3" id="partangiangan_sektor"></div>
<div class="mt-3" id="ina_ester"></div>
<div class="mt-3" id="pp_remaja"></div>


</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
   <script>
            Highcharts.chart('sekolah_minggu', {
        chart: {
            type: 'line'
        },
        title: {
            text: '<b>Statistik Jemaat Menurut Sekolah Minggu</b>'
        },
        xAxis: {
            categories: [
                    'Agustus',
                    'September',
                    'Oktober',
                    'November',
                    'Desember'
                ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: '<b>Jumlah Jemaat Sekolah Minggu</b>'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.f}</b></td></tr>',
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
                name: 'Jemaat Sekolah Minggu',
                data: [50,55,68,89,97]
            }]
    });
    </script>

<script>
            Highcharts.chart('minggu_sesiI', {
        chart: {
            type: 'line'
        },
        title: {
            text: '<b>Statistik Jemaat Pada Minggu Sesi I</b>'
        },
        xAxis: {
            categories: [
                    'Agustus',
                    'September',
                    'Oktober',
                    'November',
                    'Desember'
                ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: '<b>Jumlah Jemaat Pada Minggu Sesi I</b>'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.f}</b></td></tr>',
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
                name: 'Jemaat Minggu Sesi I',
                data: [145,168,136,158,198]
            }]
    });
    </script>

<script>
            Highcharts.chart('minggu_sesiII', {
        chart: {
            type: 'line'
        },
        title: {
            text: '<b>Statistik Jemaat Pada Minggu Sesi II</b>'
        },
        xAxis: {
            categories: [
                    'Agustus',
                    'September',
                    'Oktober',
                    'November',
                    'Desember'
                ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: '<b>Jumlah Jemaat Pada Minggu Sesi II</b>'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.f}</b></td></tr>',
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
                name: 'Jemaat Minggu Sesi II',
                data: [125,137,115,119,167]
            }]
    });
    </script>

<script>
            Highcharts.chart('sermon_jemaat', {
        chart: {
            type: 'line'
        },
        title: {
            text: '<b>Statistik Jemaat Pada Sermon Jemaat</b>'
        },
        xAxis: {
            categories: [
                    'Agustus',
                    'September',
                    'Oktober',
                    'November',
                    'Desember'
                ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: '<b>Jumlah Jemaat Sermon Jemaat</b>'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.f}</b></td></tr>',
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
                name: 'Jemaat Sermon Jemaat',
                data: [48,58,36,44,65]
            }]
    });
    </script>

<script>
            Highcharts.chart('ina_kamis', {
        chart: {
            type: 'line'
        },
        title: {
            text: '<b>Statistik Jemaat Ina Kamis</b>'
        },
        xAxis: {
            categories: [
                    'Agustus',
                    'September',
                    'Oktober',
                    'November',
                    'Desember'
                ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: '<b>Jumlah Jemaat Ina Kamis</b>'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.f}</b></td></tr>',
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
                name: 'Jemaat Ina Kamis',
                data: [40,45,36,30,34]
            }]
    });
    </script>

<script>
            Highcharts.chart('partangiangan_sektor', {
        chart: {
            type: 'line'
        },
        title: {
            text: '<b>Statistik Jemaat Pada Partangiangan sektor</b>'
        },
        xAxis: {
            categories: [
                    'Agustus',
                    'September',
                    'Oktober',
                    'November',
                    'Desember'
                ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: '<b>Jumlah Jemaat Pada Partangiangan sektor</b>'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.f}</b></td></tr>',
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
                name: 'Jemaat Pada Partangiangan sektor',
                data: [48,36,40,55,50]
            }]
    });
    </script>

    <script>
            Highcharts.chart('ina_ester', {
        chart: {
            type: 'line'
        },
        title: {
            text: '<b>Statistik Jemaat Ina Ester</b>'
        },
        xAxis: {
            categories: [
                    'Agustus',
                    'September',
                    'Oktober',
                    'November',
                    'Desember'
                ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: '<b>Jumlah Jemaat Ina Ester</b>'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.f}</b></td></tr>',
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
                name: 'Jemaat Ina Ester',
                data: [28,25,36,32,40]
            }]
    });
    </script>

    <script>
            Highcharts.chart('pp_remaja', {
        chart: {
            type: 'line'
        },
        title: {
            text: '<b>Statistik Jemaat PP Remaja</b>'
        },
        xAxis: {
            categories: [
                    'Agustus',
                    'September',
                    'Oktober',
                    'November',
                    'Desember'
                ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: '<b>Jumlah Jemaat PP Remaja</b>'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.f}</b></td></tr>',
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
                name: 'Jemaat PP Remaja',
                data: [48,58,46,60,45]
            }]
    });
    </script>
      
@endsection
