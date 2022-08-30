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
<div id="a"></div>


</div>

<script src="https://code.highcharts.com/stock/highstock.js"></script>
    <script>
         var totalspem =  <?php echo json_encode($totalpemasukan) ?>;
         var totalspen =  <?php echo json_encode($totalpengeluaran) ?>;
         var bulans =  <?php echo json_encode($bulan) ?>;
         Highcharts.chart('a', {
        title: {
            text: '<b>Statistik Data Keuangan</b>'
        },
        xAxis: {
            categories : bulans,   
        },

        yAxis: {
            title :{
                text : '<b>Total Keuangan</b>'
            }         
        },
        plotOptions :{
            series :{
                allowPointSelect : true
            }
        },
        series: [
            {
                name : 'Total Pemasukan',        
                data: totalspem       
            },
            {
                name : 'Total Pengeluaran',        
                data: totalspen  
            }
        ],

        });
    </script>

@stop
