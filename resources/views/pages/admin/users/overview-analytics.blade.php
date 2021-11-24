@extends('layouts.admin.app')

@section('content')
<section id="content">
    
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h3 class="mb-00">Traffic</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="page-section padded-10 mb-20">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-6 mb-10">
                    <div class="flex-page-filter">
                        <div class="form-group mb-0">
                            <input type="date" class="form-control form-control-sm first-focus" name="start_date" id="start_date" value="{{ \Carbon\Carbon::parse($start_date)->format('Y-m-d') }}">
                        </div>
                        <div class="form-group mb-0">
                            <input type="date" class="form-control form-control-sm" name="end_date" id="end_date" value="{{ \Carbon\Carbon::parse($end_date)->format('Y-m-d') }}">
                        </div>
                        <div class="form-group mb-0">
                            <button type="button" class="btn btn-sm btn-block btn-success btn-filter">Apply</button>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 mb-50">
                    <div class="card h-100">
                        <div class="card-body" id="chartContainer" style="height: 300px; width: 100%;"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-20">
                    <div class="row">
                        <div class="col-md-4 mb-20">
                            <div class="card h-100">
                                <div class="card-body text-center">
                                    <p>Users</p>
                                    <h3>{{ $detail_analytics_data->totalsForAllResults['ga:users'] }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-20">
                            <div class="card h-100">
                                <div class="card-body text-center">
                                    <p>New Users</p>
                                    <h3>{{ $detail_analytics_data->totalsForAllResults['ga:newUsers'] }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-20">
                            <div class="card h-100">
                                <div class="card-body text-center">
                                    <p>Sessions</p>
                                    <h3>{{ $detail_analytics_data->totalsForAllResults['ga:sessions'] }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-20">
                            <div class="card h-100">
                                <div class="card-body text-center">
                                    <p>Number of Sessions per User</p>
                                    <h3>{{ number_format($detail_analytics_data->totalsForAllResults['ga:sessionsPerUser'], 2, '.', ',') }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-20">
                            <div class="card h-100">
                                <div class="card-body text-center">
                                    <p>Page Views</p>
                                    <h3>{{ number_format($detail_analytics_data->totalsForAllResults['ga:pageviews'], 2, '.', ',') }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-20">
                            <div class="card h-100">
                                <div class="card-body text-center">
                                    <p>Pages/Session</p>
                                    <h3>{{ number_format($detail_analytics_data->totalsForAllResults['ga:pageviewsPerSession'], 2, '.', ',') }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-20">
                            <div class="card h-100">
                                <div class="card-body text-center">
                                    <p>Avg. Session Duration</p>
                                    <h3>{{ gmdate('H:i:s', $detail_analytics_data->totalsForAllResults['ga:avgSessionDuration']) }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-20">
                            <div class="card h-100">
                                <div class="card-body text-center">
                                    <p>Bounce Rate</p>
                                    <h3>{{ number_format($detail_analytics_data->totalsForAllResults['ga:bounceRate'], 2, '.', ',').'%' }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 mb-20"></div>
                <div class="col-md-4 mb-20">
                    <div class="card h-100">
                        <div class="card-body" id="chartPieContainer" style="height: 300px; width: 90%;"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</section>

<style type="text/css">
    /*page specific css*/

</style>
@endsection
@section('js')
<script>
    $(document).ready(function() {
        
        // page specific scripts

    })
</script>
<script>
    $(document).ready(function() {
        
        $('body').on('click', '.btn-filter', function(e) {
            e.preventDefault();
            
            var startDate = $('#start_date').val();
            var endDate = $('#end_date').val();

            var urlString = ("{{ url('admin-tkmu/users-traffics') }}?start_date="+startDate+"&end_date="+endDate).replace(/&amp;/g, '&');
            location.href = urlString;
        })

    })
</script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script>
    var dataStatistic = [];
    @foreach ($analytics_data as $key => $item)
      dataStatistic.push({ x : new Date("{{ $item['date']->format('F d, Y') }}"), y : parseInt("{{ $item['visitors'] }}")})
    @endforeach

    window.onload = function () {

        var chart = new CanvasJS.Chart("chartContainer", {
          animationEnabled: true,
          theme: "light2",
          axisX: {
            interval: 1,
          },
          title:{
            text: "Audience Overview {{ \Carbon\Carbon::parse($start_date)->format('d M Y') }} - {{ \Carbon\Carbon::parse($end_date)->format('d M Y') }}"
          },
          data: [{        
            type: "line",
            indexLabelFontSize: 12,
            dataPoints: dataStatistic
          }]
        });

        showDefaultText(chart, "No Data available");
        chart.render();

        var pieChart = new CanvasJS.Chart("chartPieContainer", {
            animationEnabled: true,
            legend:{
                cursor: "pointer",
            },
            data: [{
                type: "pie",
                showInLegend: true,
                toolTipContent: "{name}: <strong>{y}</strong>",
                indexLabel: "{percentage}%",
                dataPoints: [
                    {y: "{{ number_format($new_visitors, 2, '.', ',') }}", name: "New Visitors", percentage : "{{ $percentage_new_visitors }}"},
                    {y: "{{ number_format($returning_visitors, 2, '.', ',') }}", name: "Returning Visitors", percentage : "{{ $percentage_returning_visitors }}"},
                ]
            }]
        });
        pieChart.render();

    }

    function showDefaultText(chart, text){
        var isEmpty = !(chart.options.data[0].dataPoints && chart.options.data[0].dataPoints.length > 0);
        
        if(!chart.options.subtitles)
            (chart.options.subtitles = []);
        
        if(isEmpty)
            chart.options.subtitles.push({
            text : text,
            verticalAlign : 'center',
        });
        else
            (chart.options.subtitles = []);
    }
</script>
@endsection