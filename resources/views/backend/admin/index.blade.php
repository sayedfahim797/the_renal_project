@extends('backend.admin.template.layout')

@section('backend-title')
  <title>Admin Dashboard | Atrytech Information Technology</title>
@endsection

@section('dashboard-content')

<!--state overview start-->
<div class="row state-overview" style="padding-bottom: 500px;">
    <div class="col-lg-3 col-sm-6">
        <section class="card">
            <div class="symbol terques">
                <i class="fa fa-file-text"></i>
            </div>
            <div class="value">
                @php
                $total_admin=App\User::where('role_id', '3')->count('id');
                $total_doctor=App\User::where('role_id', '2')->count('id');
                $total_staff=App\User::where('role_id', '1')->count('id');
                $total_branch=App\Models\Backend\Admin\Branch::count('id');
                @endphp
                <h1 class="count">
                    0
                </h1>
                <p>Total Admin</p>
            </div>
        </section>
    </div>
    <div class="col-lg-3 col-sm-6">
        <section class="card">
            <div class="symbol red">
                <i class="fa fa-medkit"></i>
            </div>
            <div class="value">
                <h1 class=" count2">
                    0
                </h1>
                <p>Total Doctor</p>
            </div>
        </section>
    </div>
    <div class="col-lg-3 col-sm-6">
        <section class="card">
            <div class="symbol yellow">
                <i class="fa fa-strikethrough"></i>
            </div>
            <div class="value">
                <h1 class=" count3">
                    0
                </h1>
                <p>Total Staff</p>
            </div>
        </section>
    </div>
    <div class="col-lg-3 col-sm-6">
        <section class="card">
            <div class="symbol blue">
                <i class="fa fa-book"></i>
            </div>
            <div class="value">
                <h1 class=" count4">
                    0
                </h1>
                <p>Total Branch</p>
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

  countUp({!! $total_admin !!});

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

  countUp2({!! $total_doctor !!}); 

  function countUp3(count)
  {
      var div_by = 100,
          speed = Math.round(count / div_by),
          $display = $('.count3'),
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

  countUp3({!! $total_staff !!});

  function countUp4(count)
  {
      var div_by = 100,
          speed = Math.round(count / div_by),
          $display = $('.count4'),
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

  countUp4({!! $total_branch !!});
</script>

@endsection