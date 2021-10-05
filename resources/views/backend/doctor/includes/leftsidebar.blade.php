<aside>
  @php
      $prefix =Request::route()->getPrefix();
      $route =Route::current()->getName();
  @endphp
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
            <li>
                <a class="{{($route=='doctor')?'active':''}}" href="{{ route('doctor') }}">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>