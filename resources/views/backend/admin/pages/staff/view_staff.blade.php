@extends('backend.admin.template.layout')

@section('backend-title')
  <title>View Staff | Atrytech Information Technology</title>
@endsection

@section('dashboard-content')

<div class="row">
    <div class="col-lg-12">
        <!--breadcrumbs start -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb pull-right">
                <a href="{{ route('createStaffs') }}" class="btn btn-success btn-sm" style="font-family: Kufam;"><i class="fa fa-plus-circle"></i> Add Staff</a>
            </ol>
        </nav>
        <!--breadcrumbs end -->
    </div>
</div>

<!-- page start-->
<div class="row" style="padding-bottom: 320px;">
<div class="col-lg-12">
    <section class="card">
        <header class="card-header bg-info text-light">
             <center><b style="font-family: Algerian; font-size: 17px;"><i class="fa fa-eye"></i> View Staff</b></center>
        </header>

        <div class="card-body">
            <div class="adv-table table-responsive">
             <table class="display table table-bordered table-striped" id="dynamic-table">
                <thead>
                <tr>
                    <th>SL.</th>
                    <th style="min-width: 58px; width: 60px;">Image</th>
                    <th>User Role</th>
                    <th>Branch</th>
                    <th>Name</th>
                    <th class="hidden-phone">Email</th>
                    <th class="hidden-phone">Phone</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($allData as $key => $row)
                  <tr>
                    <th class="gradeX">{{ $key+1 }}</th>
                    <td>
                        <div>
                        <img src="{{ (!empty($row['user']['photo']))?url('public/upload/user_images/'.$row['user']['photo']):url('public/upload/blank.png') }}" style="height: 30px; width: 30px;">
                        </div>
                    </td>
                    <td>
                        @if ($row['user']['role_id'] == 1)
                            <span class="badge badge-dark">Staff</span>
                        @endif
                    </td>
                    <td>
                       <span class="badge badge-info">{{ $row['branch']['name'] }}</span>
                    </td>
                    <td>{{ $row['user']['name'] }}</td>
                    <td class="hidden-phone">{{ $row['user']['email'] }}</td>
                    <td class="hidden-phone">{{ $row['user']['mobile'] }}</td>
                    <td>
                      <a title="Edit" href="{{ route('editStaffs', $row->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                      <a title="Delete" href="{{ route('deleteStaffs', $row->id) }}" id="delete" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th>SL.</th>
                    <th>Image</th>
                    <th>User Role</th>
                    <th>Branch</th>
                    <th>Name</th>
                    <th class="hidden-phone">Email</th>
                    <th class="hidden-phone">Phone</th>
                    <th>Action</th>
                  </tr>
                </tfoot>
             </table>
            </div>
        </div>     
    </section>
</div>
</div>
<!-- page end-->

@endsection