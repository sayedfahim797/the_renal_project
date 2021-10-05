@extends('backend.staff.template.layout')

@section('backend-title')
  <title>View Patient | Atrytech Information Technology</title>
@endsection

@section('dashboard-content')

<div class="row">
    <div class="col-lg-12">
        <!--breadcrumbs start -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb pull-right">
                <a href="{{ route('createPatients') }}" class="btn btn-success btn-sm" style="font-family: Kufam;"><i class="fa fa-plus-circle"></i> Add Patient</a>
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
             <center><b style="font-family: Algerian; font-size: 17px;"><i class="fa fa-eye"></i> View Patient</b></center>
        </header>

        <div class="card-body">
            <div class="adv-table table-responsive">
             <table class="display table table-bordered table-striped" id="dynamic-table">
                <thead>
                <tr>
                    <th>SL.</th>
                    <th>Name</th>
                    <th class="hidden-phone">Email</th>
                    <th class="hidden-phone">Phone</th>
                    <th>Gender</th>
                    <th>Birth</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($allData as $key => $row)
                  <tr>
                    <th class="gradeX">{{ $key+1 }}</th>
                    <td>{{ $row->name }}</td>
                    <td class="hidden-phone">{{ $row->email }}</td>
                    <td class="hidden-phone">{{ $row->mobile }}</td>
                    <td>{{ $row->gender }}</td>
                    <td>{{date('d-m-Y', strtotime($row->dob))}}</td>
                    <td>{{ substr($row->address, 0, 25).'...' }}</td>
                    <td>
                      <a title="Edit" href="{{ route('editPatients', $row->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                      <a title="Delete" href="{{ route('deletePatients', $row->id) }}" id="delete" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th>SL.</th>
                    <th>Name</th>
                    <th class="hidden-phone">Email</th>
                    <th class="hidden-phone">Phone</th>
                    <th>Gender</th>
                    <th>Birth</th>
                    <th>Address</th>
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