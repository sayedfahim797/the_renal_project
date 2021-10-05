<aside>
  @php
      $prefix =Request::route()->getPrefix();
      $route =Route::current()->getName();
  @endphp
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
            <li>
                <a class="{{($route=='admin')?'active':''}}" href="{{ route('admin') }}">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <hr style="margin-top: 14px; margin-bottom: 14px; border-top: 1px solid #3b4a5c;">

            <li class="sub-menu">
                <a href="javascript:;" class="{{($prefix=='/admins')?'active':''}}">
                    <i class="fa fa-users"></i>
                    <span>Manage Admin</span>
                </a>
                <ul class="sub">
                    <li class="{{($route=='createAdmins')?'active':''}}"><a  href="{{ route('createAdmins') }}">Add Admin</a></li>
                    <li class="{{($route=='viewAdmins')?'active':''}}"><a  href="{{ route('viewAdmins') }}">View Admin</a></li>
                </ul>
            </li>

            <li class="sub-menu">
                <a href="javascript:;" class="{{($prefix=='/doctors')?'active':''}}">
                    <i class="fa fa-users"></i>
                    <span>Manage Doctor</span>
                </a>
                <ul class="sub">
                    <li class="{{($route=='createDoctors')?'active':''}}"><a  href="{{ route('createDoctors') }}">Add Doctor</a></li>
                    <li class="{{($route=='viewDoctors')?'active':''}}"><a  href="{{ route('viewDoctors') }}">View Doctor</a></li>
                </ul>
            </li>

            <li class="sub-menu">
                <a href="javascript:;" class="{{($prefix=='/staffs')?'active':''}}">
                    <i class="fa fa-users"></i>
                    <span>Manage Staff</span>
                </a>
                <ul class="sub">
                    <li class="{{($route=='createStaffs')?'active':''}}"><a  href="{{ route('createStaffs') }}">Add Staff</a></li>
                    <li class="{{($route=='viewStaffs')?'active':''}}"><a  href="{{ route('viewStaffs') }}">View Staff</a></li>
                </ul>
            </li>

            <hr style="margin-top: 14px; margin-bottom: 14px; border-top: 1px solid #3b4a5c;">

            <li class="sub-menu">
                <a href="javascript:;" class="{{($prefix=='/branches')?'active':''}}">
                    <i class="fa fa-users"></i>
                    <span>Manage Branch</span>
                </a>
                <ul class="sub">
                    <li class="{{($route=='createBranches')?'active':''}}"><a  href="{{ route('createBranches') }}">Add Branch</a></li>
                    <li class="{{($route=='viewBranches')?'active':''}}"><a  href="{{ route('viewBranches') }}">View Branch</a></li>
                </ul>
            </li>

            <hr style="margin-top: 14px; margin-bottom: 14px; border-top: 1px solid #3b4a5c;">
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>