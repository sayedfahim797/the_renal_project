<aside>
  @php
      $prefix =Request::route()->getPrefix();
      $route =Route::current()->getName();
  @endphp
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
            <li>
                <a class="{{($route=='staff')?'active':''}}" href="{{ route('staff') }}">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="sub-menu">
                <a href="javascript:;" class="{{($prefix=='/patients')?'active':''}}">
                    <i class="fa fa-users"></i>
                    <span>Manage Patient</span>
                </a>
                <ul class="sub">
                    <li class="{{($route=='createPatients')?'active':''}}"><a  href="{{ route('createPatients') }}">Add Patient</a></li>
                    <li class="{{($route=='viewPatients')?'active':''}}"><a  href="{{ route('viewPatients') }}">View Patient</a></li>
                </ul>
            </li>
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>