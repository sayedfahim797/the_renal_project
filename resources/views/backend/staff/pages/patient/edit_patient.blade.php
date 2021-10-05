@extends('backend.staff.template.layout')

@section('backend-title')
  <title>Update Patient | Atrytech Information Technology</title>
@endsection

@section('dashboard-content')

<div class="row">
    <div class="col-lg-12">
        <!--breadcrumbs start -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb pull-right">
                <a href="{{ route('viewPatients') }}" class="btn btn-info btn-sm" style="font-family: Kufam;"><i class="fa fa-eye"></i> View Patient</a>
            </ol>
        </nav>
        <!--breadcrumbs end -->
    </div>
</div>

<!-- page start-->

<div class="row" style="padding-bottom: 320px;">
    <div class="col-lg-12">
        <section class="card">
            <header class="card-header bg-primary text-light">
                 <center><b style="font-family: Algerian; font-size: 17px;"><i class="fa fa-location-arrow"></i> Update Patient</b></center>
            </header>
            <div class="card-body">
               <div class="form">
                  <form action="{{ route('updatePatients', $allData->id) }}" method="post" enctype="multipart/form-data" id="myForm">
                    @csrf
                    
                    <div class="row">
                      <div class="col-md-4"> 
                          <div class="form-group"> 
                              <label class="control-label">Name</label> 
                              <input class="form-control" type="text" name="name" id="name" placeholder="Name" value="{{ $allData->name }}">
                          </div> 
                      </div>
                      <div class="col-md-4"> 
                          <div class="form-group"> 
                              <label class="control-label">Email</label> 
                              <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" id="email" placeholder="Email" value="{{ $allData->email }}">
                              @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                          </div> 
                      </div>
                      <div class="col-md-4"> 
                          <div class="form-group"> 
                              <label class="control-label">Mobile</label> 
                              <input class="form-control @error('mobile') is-invalid @enderror" type="number" name="mobile" id="mobile" placeholder="Mobile" value="{{ $allData->mobile }}">
                              @error('mobile')
                                    <div class="alert alert-danger">{{ $message }}</div>
                              @enderror 
                          </div> 
                      </div> 
                    </div>

                    <div class="row">
                      <div class="col-md-6"> 
                          <div class="form-group"> 
                              <label class="control-label">Gender <font style="color: red">*</font></label> 
                              <select name="gender" class="select2">
                                <option value="">Select Gender</option>
                                <option value="Male" {{($allData->gender == "Male")?"selected":""}}>Male</option>
                                <option value="Female" {{($allData->gender == "Female")?"selected":""}}>Female</option>
                                <option value="Other" {{($allData->gender == "Other")?"selected":""}}>Other</option>
                              </select> 
                          </div> 
                      </div>
                      <div class="col-md-6"> 
                          <div class="form-group"> 
                              <label class="control-label">Date Of Birth</label> 
                              <div class="input-group date dpYears" data-date-viewmode="years" data-date-format="dd-mm-yyyy" data-date="01-01-2021">
                                <input type="text" name="dob" id="dob" class="form-control" aria-label="Right Icon" aria-describedby="dp-ig" placeholder="DD-MM-YYYY" value="{{ $allData->dob }}">
                                <div class="input-group-append">
                                    <button id="dp-ig" class="btn btn-primary btn-outline-secondary" type="button"><i class="fa fa-calendar f14"></i></button>
                                </div>
                              </div>
                          </div> 
                      </div> 
                    </div>

                    <div class="row">
                      <div class="col-md-12"> 
                          <div class="form-group"> 
                              <label class="control-label">Address</label>
                               <textarea class="form-control" name="address" cols="30" rows="3" placeholder="Address">{{ $allData->address }}</textarea>
                          </div> 
                      </div>
                    </div>
                    
                    <br>
                    <div class="row">
                      <div class="col-md-12">
                      <div class="form-group pull-right">
                           <button class="btn btn-primary" id="storeButton" type="submit"><i class="fa fa-refresh"> Update</i></button>
                        </div>
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
        'email': {
          required: true
        },
        'mobile': {
          required: true
        },
        'gender': {
          required: true
        },
        'address': {
          required: true
        } 
      }
    });  
  });
</script>

<script type="text/javascript">
  $(function(){
      $(document).on("click","#storeButton", function () {
      var dob = $('#dob').val();
            
      if(dob==''){
      $.notify("Date Of Birth is required", {globalPosition: 'top right',className: 'error'}); 
      return false;
      }
      
     });
  });
</script>

@endsection