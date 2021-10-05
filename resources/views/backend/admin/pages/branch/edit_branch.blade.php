@extends('backend.admin.template.layout')

@section('backend-title')
  <title>Update Branch | Atrytech Information Technology</title>
@endsection

@section('dashboard-content')

  <div class="row justify-content-center">
      <div class="col-lg-10">
          <!--breadcrumbs start -->
          <nav aria-label="breadcrumb">
              <ol class="breadcrumb pull-right">
                  <a href="{{ route('viewBranches') }}" class="btn btn-info btn-sm" style="font-family: Kufam;"><i class="fa fa-eye"></i> View Branch</a>
              </ol>
          </nav>
          <!--breadcrumbs end -->
      </div>
  </div>

  <!-- page start-->

  <div class="row justify-content-center" style="padding-bottom: 320px;">
      <div class="col-lg-10">
          <section class="card">
              <header class="card-header bg-primary text-light">
                   <center><b style="font-family: Algerian; font-size: 17px;"><i class="fa fa-location-arrow"></i> Update Branch</b></center>
              </header>
              <div class="card-body">
                 <div class="form">
                    <form action="{{ route('updateBranches', $allData->id) }}" method="post" enctype="multipart/form-data" id="myForm" class="cmxform form-horizontal tasi-form">
                      @csrf
                      <div class="form-group row">
                          <label for="firstname" class="control-label col-lg-2">Branch Name *</label>
                          <div class="col-lg-10">
                              <input class="form-control @error('name') is-invalid @enderror" id="name" name="name" type="text"  value="{{ $allData->name }}" />
                              @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                          </div>
                      </div>
                      <div class="form-group row">
                          <label for="firstname" class="control-label col-lg-2">Amount *</label>
                          <div class="col-lg-10">
                              <input class="form-control" id="amount" name="amount" type="number"  value="{{ $allData->amount }}" />
                          </div>
                      </div>
                      <div class="form-group row">
                          <div class="col-lg-12">
                              <button class="btn btn-primary" type="submit"><i class="fa fa-refresh"> Update</i></button>
                          </div>
                      </div>
                    </form>
               </div>
             </div>
          </section>
      </div>
  </div>
        
  <!-- page end-->

    <script type="text/javascript">
            $(document).ready(function() {
              $('#myForm').validate({
                rules: {
                    'name': {
                    required: true
                  },
                  'amount': {
                    required: true
                  }  
                }
              });  
            });
    </script>

@endsection