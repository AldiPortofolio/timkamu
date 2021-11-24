@extends('layouts.admin.app')

@section('content')
<section id="content">
    
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h3 class="mb-00">Members Overview</h3>
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

                <div class="col-md-12 mb-50">
                    <div class="card h-100">
                        <div class="card-body" id="chartContainer" style="height: 300px; width: 100%;"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-20">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title font-size-16">Registrations</h5>
                            <table class="table table-sm table-bordered mb-0">
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td class="w-20">Phone Verified</td>
                                        <td class="w-10">Total</td>
                                    </tr>
                                    <tr>
                                        <td><a href="#">Registrations today</a></td>
                                        <td class="text-right">{{ number_format($total_verified_today, 0, '.', ',') }} <span class="o3">({{ $percentage_verified_today }}%)</span></td>
                                        <td class="text-right">{{ number_format($total_registration_today, 0, '.', ',') }}</td>
                                    </tr>
                                    <tr>
                                        <td><a href="#">Registrations last 7 days</a></td>
                                        <td class="text-right">{{ number_format($total_verified_this_week, 0, '.', ',') }} <span class="o3">({{ $percentage_verified_this_week }}%)</span></td>
                                        <td class="text-right">{{ number_format($total_registration_this_week, 0, '.', ',') }}</td>
                                    </tr>
                                    <tr>
                                        <td><a href="#">Registrations this month</a></td>
                                        <td class="text-right">{{ number_format($total_verified_this_month, 0, '.', ',') }} <span class="o3">({{ $percentage_verified_this_month }}%)</span></td>
                                        <td class="text-right">{{ number_format($total_registration_this_month, 0, '.', ',') }}</td>
                                    </tr>
                                    <tr>
                                        <td><a href="#">Registrations this year</a></td>
                                        <td class="text-right">{{ number_format($total_verified_this_year, 0, '.', ',') }} <span class="o3">({{ $percentage_verified_this_year }}%)</span></td>
                                        <td class="text-right">{{ number_format($total_registration_this_year, 0, '.', ',') }}</td>
                                    </tr>
                                    <tr>
                                        <td><a href="#">Total</a></td>
                                        <td class="text-right">{{ number_format($total_all_verified, 0, '.', ',') }} <span class="o3">({{ $percentage_all_verified }}%)</span></td>
                                        <td class="text-right">{{ number_format($total_all, 0, '.', ',') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

                {{-- <div class="col-md-6 mb-20">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title font-size-16">Total members</h5>
                            <p class="mb-0">{{ number_format($total_member_this_month, 0, '.', ',') }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-20">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title font-size-16">Total verified phones</h5>
                            <p class="mb-0">{{ number_format($total_verified_member_this_month, 0, '.', ',') }}</p>
                        </div>
                    </div>
                </div>

            </div>
            
            <div class="row">
                <div class="col-md-3 mb-20">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title font-size-16">Registrations today</h5>
                            <p class="mb-0">{{ number_format($total_registration_today, 0, '.', ',') }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-20">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title font-size-16 mb-0">Registrations last 7 days</h5>
                            <p class="mb-0">{{ number_format($total_registration_week, 0, '.', ',') }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-20">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title font-size-16">Registrations this month</h5>
                            <p class="mb-0">{{ number_format($total_registration_month, 0, '.', ',') }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-20">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title font-size-16">Registrations this year</h5>
                            <p class="mb-0">{{ number_format($total_registration_year, 0, '.', ',') }}</p>
                        </div>
                    </div>
                </div>
            </div> --}}
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
            
            var filter = $('#filter-value').val();

            location.href = "{{ url('admin-tkmu/users-overview') }}?filter="+filter;
        })

    })
</script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script>
    var dataStatistic = [];
    @foreach ($users as $key => $item)
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
            text: "New registrations (phone verified)"
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