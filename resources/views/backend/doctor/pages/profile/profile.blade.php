@extends('backend.doctor.template.layout')

@section('backend-title')
  <title>Doctor Profile | Atrytech Information Technology</title>
@endsection

@section('dashboard-content')

<!-- page start-->
<div class="row justify-content-center">
    <div class="col-lg-8">
        <!--widget start-->
        <aside class="profile-nav alt green-border">
            <section class="card">
                <div class="user-heading alt green-bg">
                    <a href="#">
                      <img alt="" src="{{ (!empty(Auth::user()->photo))?url('public/upload/user_images/'.Auth::user()->photo):url('public/upload/blank.png') }}">
                      </a>
                    <h1>{{ Auth::user()->name }}</h1>
                    <p>{{ Auth::user()->email }}</p>
                    <span class="badge badge-info">Doctor</span>
                </div>

                <ul class="nav nav-pills nav-stacked">
                    <li class="nav-item"><a class="nav-link" href="javascript:;"> <i class="fa fa-phone"></i> {{ Auth::user()->mobile }} </a></li>
                    <li class="nav-item"><a class="nav-link" href="javascript:;"> <i class="fa fa-envelope-o"></i> Message <span class="badge badge-success pull-right r-activity">10</span></a></li>
                </ul>

            </section>
        </aside>
        <!--widget end-->
    </div>
</div>
<!-- page end-->

@endsection