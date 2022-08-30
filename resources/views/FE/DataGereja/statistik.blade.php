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

<div id="jumlah"></div>
<div class="mt-3" id="gereja"></div>
<div class="mt-3" id="jenis_kelamin"></div>

</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
            Highcharts.chart('jumlah', {
        chart: {
            type: 'line'
        },
        title: {
            text: '<b>Statistik Jemaat Menurut Kelompok Aktif, Pindah Dan Meninggal</b>'
        },
        xAxis: {
            categories: ['2022'],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: '<b>Jumlah Jemaat</b>'
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
            name: '<b>Jemaat Aktif</b>',
            data: [{!!json_encode($jemaats->where("status", "Aktif")->count())!!}
             ]
        }, {
            name: '<b>Jemaat Meninggal</b>',
            data: [
            {!!json_encode($jemaats->where("status", "Meninggal")->count())!!}
            ]
        }, {
            name: '<b>Jemaat Pindah</b>',
            data: [
            {!!json_encode($jemaats->where("status", "Pindah")->count())!!}
            ]
        }
        
        ]
    });
    </script>

   <script>
            Highcharts.chart('gereja', {
        chart: {
            type: 'line'
        },
        title: {
            text: '<b>Statistik Jemaat Menurut Kelompok Sektor</b>'
        },
        xAxis: {
            categories: {!!json_encode($categories)!!},
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: '<b>Jumlah Jemaat</b>'
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
            name: '<b>Sektor Jemaat</b>',
            data: [{!!json_encode($jemaats->where("sektor_id", "1")->count())!!}, 
            {!!json_encode($jemaats->where("sektor_id", "2")->count())!!}, 
            {!!json_encode($jemaats->where("sektor_id", "3")->count())!!}, 
            {!!json_encode($jemaats->where("sektor_id", "4")->count())!!}, 
            {!!json_encode($jemaats->where("sektor_id", "5")->count())!!}, 
            {!!json_encode($jemaats->where("sektor_id", "6")->count())!!},
            {!!json_encode($jemaats->where("sektor_id", "7")->count())!!}
            ]
        }]
    });
    </script>

      <script>
            Highcharts.chart('jenis_kelamin', {
        chart: {
            type: 'line'
        },
        title: {
            text: '<b>Statistik Jemaat Menurut Kelompok Umur Dan Jenis Kelamin </b>'
        },
        xAxis: {
            categories: ['0-10 Tahun','10-20 Tahun','21-30 Tahun','31 -- Tahun'],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: '<b>Jumlah Jemaat</b>'
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
            name: '<b>Laki-Laki</b>',
            data: [{!!json_encode($jemaats->where("sektor_id", "1")->count())!!},
             {!!json_encode($jemaats->where("sektor_id", "6")->count())!!},
             {!!json_encode($jemaats->where("sektor_id", "2")->count())!!},
            {!!json_encode($jemaats->where("sektor_id", "3")->count())!!}
            ]
        },{
            name: '<b>Perempuan</b>',
            data: [
            {!!json_encode($jemaats->where("sektor_id", "1")->count())!!},
            {!!json_encode($jemaats->where("sektor_id", "3")->count())!!},
            {!!json_encode($jemaats->where("sektor_id", "6")->count())!!},
            {!!json_encode($jemaats->where("sektor_id", "7")->count())!!}
            ]
        }]
    });
    </script>
@endsection
