@extends('layouts.admin.app')

@section('content')
<section id="content">
    
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h3 class="mb-00">Loyalty Points Recharge Report</h3>
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
                            <input type="month" class="form-control form-control-sm" name="filter" id="filter-value" @if(app('request')->input('filter')) value="{{ app('request')->input('filter') }}" @else value="{{ \Carbon\Carbon::now()->format('Y-m') }}" @endif>
                        </div>
                        <div class="form-group mb-0">
                            <button type="button" class="btn btn-sm btn-block btn-success btn-filter">Apply</button>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-10">
                    <div class="flex-page-filter justify-content-end">
                        <div class="form-group mb-0 ">
                            <a href="{{ url('admin-tkmu/lp-circulation') }}" class="btn btn-sm btn-block btn-light">View LP circulation report</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 mb-20">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="card-body" id="chartContainer" style="height: 300px; width: 100%;"></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-20">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title font-size-16">LP recharge today</h5>
                            <p class="mb-0">{{ number_format($total_recharge_lp_today, 0, '.', ',') }}<span class="money money-14 right"><img src="{{ asset('img/currencies/lp.svg') }}"></span></p>
                            <p class="o5 mb-0">Rp {{ number_format($total_recharge_lp_today*1000, 0, '.', ',') }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-20">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title font-size-16">LP Recharge last 7 days</h5>
                            <p class="mb-0">{{ number_format($total_recharge_lp_week, 0, '.', ',') }}<span class="money money-14 right"><img src="{{ asset('img/currencies/lp.svg') }}"></span></p>
                            <p class="o5 mb-0">Rp {{ number_format($total_recharge_lp_week*1000, 0, '.', ',') }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-20">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title font-size-16">LP recharge this month</h5>
                            <p class="mb-0">{{ number_format($total_recharge_lp_month, 0, '.', ',') }}<span class="money money-14 right"><img src="{{ asset('img/currencies/lp.svg') }}"></span></p>
                            <p class="o5 mb-0">Rp {{ number_format($total_recharge_lp_month*1000, 0, '.', ',') }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-20">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title font-size-16">LP recharge this year</h5>
                            <p class="mb-0">{{ number_format($total_recharge_lp_year, 0, '.', ',') }}<span class="money money-14 right"><img src="{{ asset('img/currencies/lp.svg') }}"></span></p>
                            <p class="o5 mb-0">Rp {{ number_format($total_recharge_lp_year*1000, 0, '.', ',') }}</p>
                        </div>
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
        
        $('body').on('click', '.btn-filter', function(e) {
            e.preventDefault();
            
            var filter = $('#filter-value').val();

            location.href = "{{ url('admin-tkmu/lp-recharge') }}?filter="+filter;
        })

    })
</script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script>
    var dataStatistic = [];
    @foreach ($statistic_recharge_lp as $key => $item)
      dataStatistic.push({ x : new Date("{{ \Carbon\Carbon::parse($key)->format('F d, Y') }}"), y : parseInt("{{ $item }}")})
    @endforeach
    
    window.onload = function () {

        var chart = new CanvasJS.Chart("chartContainer", {
          animationEnabled: true,
          theme: "light2",
          axisX: {
            interval: 1,
          },
          title:{
            text: "LP Recharge {{ \Carbon\Carbon::now()->format('M-Y') }}"
          },
          data: [{        
            type: "line",
            indexLabelFontSize: 12,
            dataPoints: dataStatistic
          }]
        });

        showDefaultText(chart, "No Data available");
        chart.render();

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