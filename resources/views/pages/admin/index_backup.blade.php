@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="row">
    <div class="col-12">
      <h1 class="h3 mb-5 mt-2 text-gray-800">Welcome {{ Auth::guard('admin')->user()->username }}</h1>
    </div>
  </div>

  <div class="row">

    @if(Auth::guard('admin')->user()->role_id === 2)
    <!-- total member count -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Members</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                {{ count($total_user_verified) }} <span class="card-info-adds">(phone verified)</span>
              </div>
            </div>
            <div class="col-auto">
              <i data-feather="users" class="feather-card-icon"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endif

    <!-- total member count -->
    @if(Auth::guard('admin')->user()->role_id === 2 || $menu_grant === 'EVENT')
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Events</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total_event }}</div>
            </div>
            <div class="col-auto">
              <i data-feather="airplay" class="feather-card-icon"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endif

    {{-- @foreach ($reporting_date as $date => $rd)
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Report {{ \Carbon\Carbon::parse($date)->format('d M Y') }}</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">
                    {{ $rd['total_user_bpconverted'] }} <span class="card-info-adds">(total user convert bp to lp)</span><br>
                    {{ $rd['total_bpconverted'] }} <span class="card-info-adds">(total convert bp to lp)</span><br>
                    {{ $rd['total_bpspent'] }} <span class="card-info-adds">(total bp spent)</span><br>
                    {{ $rd['total_bpfree'] }} <span class="card-info-adds">(total bp we give for free)</span><br>
                  </div>
                </div>
                <div class="col-auto">
                  <i data-feather="dollar-sign" class="feather-card-icon"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
    @endforeach --}}

  </div>

  <div class="row">
    <div class="col-12">
      <div id="chartContainer" style="height: 300px; width: 100%;"></div>
    </div>
  </div>

</div>
@endsection

@section('js')
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script>
    var dataStatistic = [];
    @foreach ($statistic_regist_user as $key => $item)
      dataStatistic.push({ x : new Date("{{ \Carbon\Carbon::parse($key)->format('F d, Y') }}"), y : parseInt("{{ $item }}")})
    @endforeach

    console.log(dataStatistic);
    window.onload = function () {

        var chart = new CanvasJS.Chart("chartContainer", {
          animationEnabled: true,
          theme: "light2",
          axisX: {
            interval: 1,
          },
          title:{
            text: "User registration verified by phone"
          },
          data: [{        
            type: "line",
            indexLabelFontSize: 12,
            dataPoints: dataStatistic
          }]
        });
        chart.render();

    }
</script>
@endsection