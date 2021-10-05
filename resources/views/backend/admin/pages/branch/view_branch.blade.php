@extends('backend.admin.template.layout')

@section('backend-title')
  <title>View Branch | Atrytech Information Technology</title>
@endsection

@section('dashboard-content')

    <div class="row">
    <div class="col-lg-12">
        <!--breadcrumbs start -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb pull-right">
                <a href="{{ route('createBranches') }}" class="btn btn-success btn-sm" style="font-family: Kufam;"><i class="fa fa-plus-circle"></i> Add Branch</a>
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
                 <center><b style="font-family: Algerian; font-size: 17px;"><i class="fa fa-eye"></i> View Branch</b></center>
            </header>

            <div class="card-body">
                <div class="adv-table table-responsive">
                 <table class="display table table-bordered table-striped" id="dynamic-table">
                    <thead>
                    <tr class="text-center">
                        <th>SL.</th>
                        <th>Branch Name</th>
                        <th>Amount</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody class="text-center">
                      @foreach ($allData as $key => $row)
                      <tr>
                        <th class="gradeX">{{ $key+1 }}</th>
                        <td>{{ $row->name }}</td>
                        <td>{{ number_format($row->amount) }} ₹</td>
                        <td>
                          <a title="Edit" href="{{ route('editBranches', $row->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                          <a title="Delete" href="{{ route('deleteBranches', $row->id) }}" id="delete" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                    <tfoot class="text-center">
                      <tr>
                        <th>SL.</th>
                        <th>Branch Name</th>
                        <th>Amount</th>
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