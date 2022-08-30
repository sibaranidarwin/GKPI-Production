@section('content')<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" /> 
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

<div class="col-12 shadow-sm rounded mt-2 bg-white p-3">
            <div id="a"></div>
        </div>
@endsection

@section('grafik')

<script src="https://code.highcharts.com/stock/highstock.js"></script>
    <script>
         var totalspem =  <?php echo json_encode($totalpemasukan) ?>;
         var totalspen =  <?php echo json_encode($totalpengeluaran) ?>;
         var bulans =  <?php echo json_encode($bulan) ?>;
         Highcharts.chart('a', {
        title: {
            text: 'Statistik Data Keuangan'
        },
        xAxis: {
            categories : bulans,   
        },

        yAxis: {
            title :{
                text : 'Total Keuangan'
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
