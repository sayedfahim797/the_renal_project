@extends('backend.doctor.template.layout')

@section('backend-title')
  <title>Doctor Dashboard | Atrytech Information Technology</title>
@endsection

@section('dashboard-content')

<!--state overview start-->
<!--state overview start-->
<div class="row state-overview justify-content-center">
    <div class="col-lg-3 col-sm-6">
        <section class="card">
            <div class="symbol terques">
                <i class="fa fa-file-text"></i>
            </div>
            <div class="value">
                @php
                $total_parient=App\Models\Backend\Staff\Patient::count('id');
                $today_parient=App\Models\Backend\Staff\Patient::where('created_at', '>=', date('Y-m-d').' 00:00:00')->count('id');
                @endphp
                <h1 class="count">
                    0
                </h1>
                <p>Total Patient</p>
            </div>
        </section>
    </div>
    <div class="col-lg-3 col-sm-6">
        <section class="card">
            <div class="symbol red">
                <i class="fa fa-book"></i>
            </div>
            <div class="value">
                <h1 class=" count2">
                    0
                </h1>
                <p>Today Patient</p>
            </div>
        </section>
    </div>
</div>
<!--state overview end-->

<div class="row justify-content-center">
    <div class="col-lg-10">
        <section class="card">
            <div class="card-body">
                <canvas id="myChart"></canvas>
            </div>
        </section>
    </div>
</div>
<!--state overview end-->

<script type="text/javascript">

 function countUp(count)
  {
      var div_by = 100,
          speed = Math.round(count / div_by),
          $display = $('.count'),
          run_count = 1,
          int_speed = 24;

      var int = setInterval(function() {
          if(run_count < div_by){
              $display.text(speed * run_count);
              run_count++;
          } else if(parseInt($display.text()) < count) {
              var curr_count = parseInt($display.text()) + 1;
              $display.text(curr_count);
          } else {
              clearInterval(int);
          }
      }, int_speed);
  }

  countUp({!! $total_parient !!});

  function countUp2(count)
  {
      var div_by = 100,
          speed = Math.round(count / div_by),
          $display = $('.count2'),
          run_count = 1,
          int_speed = 24;

      var int = setInterval(function() {
          if(run_count < div_by){
              $display.text(speed * run_count);
              run_count++;
          } else if(parseInt($display.text()) < count) {
              var curr_count = parseInt($display.text()) + 1;
              $display.text(curr_count);
          } else {
              clearInterval(int);
          }
      }, int_speed);
  }

  countUp2({!! $today_parient !!});
</script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script type="text/javascript">
  var _ydata=JSON.parse('{!! json_encode($days) !!}');
  var _xdata=JSON.parse('{!! json_encode($dayCount) !!}');
</script>
<script src="{{ asset('public/backend') }}/assets/demo/chart-area-demo.js"></script>

<script>
  // === include 'setup' then 'config' above ===

  var myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>

@endsection