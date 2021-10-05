@extends('backend.admin.template.layout')

@section('backend-title')
  <title>Add Staff | Atrytech Information Technology</title>
@endsection

@section('dashboard-content')

<div class="row">
    <div class="col-lg-12">
        <!--breadcrumbs start -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb pull-right">
                <a href="{{ route('viewStaffs') }}" class="btn btn-info btn-sm" style="font-family: Kufam;"><i class="fa fa-eye"></i> View Staff</a>
            </ol>
        </nav>
        <!--breadcrumbs end -->
    </div>
</div>

<!-- page start-->

<div class="row" style="padding-bottom: 320px;">
    <div class="col-lg-12">
        <section class="card">
            <header class="card-header bg-success text-light">
                 <center><b style="font-family: Algerian; font-size: 17px;"><i class="fa fa-plus-circle"></i> Add Staff</b></center>
            </header>
            <div class="card-body">
               <div class="form">
                  <form action="{{ route('storeStaffs') }}" method="post" enctype="multipart/form-data" id="myForm">
                    @csrf
                    <div class="row">
                      <div class="col-md-4"> 
                          <div class="form-group"> 
                              <label class="control-label">User Role</label> 
                              <select name="role_id" class="select2">
                                <option value="">Select Role</option>
                                <option value="1">Staff</option>
                              </select> 
                          </div> 
                      </div>
                      <div class="col-md-4"> 
                          <div class="form-group"> 
                              <label class="control-label">Set Branch</label> 
                              <select name="branch_id" class="select2">
                                <option value="">Select Branch</option>
                                @foreach ($allBranch as $row)
                                  <option value="{{ $row->id }}">{{ $row->name }}</option>
                                @endforeach
                              </select> 
                          </div> 
                      </div>
                      <div class="col-md-4"> 
                          <div class="form-group"> 
                              <label class="control-label">Name</label> 
                              <input class="form-control" type="text" name="name" id="name" placeholder="Name">
                          </div> 
                      </div> 
                    </div>

                    <div class="row">
                      <div class="col-md-6"> 
                          <div class="form-group"> 
                              <label class="control-label">Email</label> 
                              <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" id="email" placeholder="Email">
                              @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                          </div> 
                      </div>
                      <div class="col-md-6"> 
                          <div class="form-group"> 
                              <label class="control-label">Mobile</label> 
                              <input class="form-control @error('mobile') is-invalid @enderror" type="number" name="mobile" id="mobile" placeholder="Mobile">
                              @error('mobile')
                                    <div class="alert alert-danger">{{ $message }}</div>
                              @enderror 
                          </div> 
                      </div> 
                    </div>

                    <div class="row">
                      <div class="col-md-6"> 
                          <div class="form-group"> 
                              <label class="control-label">Password</label> 
                              <input type="password" id="password" class="form-control" name="password" placeholder="Password" />
                          </div> 
                      </div>
                      <div class="col-md-6"> 
                          <div class="form-group"> 
                              <label class="control-label">Confirm Password</label> 
                              <input type="password" id="confirm_password" class="form-control" name="confirm_password" placeholder="Confirm Password" /> 
                          </div> 
                      </div> 
                    </div>

                    <br>
                    <div class="row">
                        <label class="control-label col-md-2">Image Upload</label>
                        <div class="controls col-md-4">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                              <span class="btn btn-white btn-file">
                              <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
                              <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                              <input type="file" class="default" name="photo" accept="image/*" class="upload" onchange="readURL(this);">
                              </span>
                                <span class="fileupload-preview" style="margin-left:5px;"></span>
                                <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"></a>
                            </div>
                        </div>
                        <div class="controls col-md-6">
                             <img id="image" src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" width="120px" height="80px" />
                        </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-md-12">
                      <div class="form-group pull-right">
                           <button class="btn btn-success" type="submit"><i class="fa fa-cloud-upload"> Upload</i></button>
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
  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $('#image')
              .attr('src', e.target.result)
              .width(120)
              .height(80);
        };
        reader.readAsDataURL(input.files[0]);
      }
  } 
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#myForm').validate({
      rules: {
        'role_id': {
          required: true
        },
        'branch_id': {
          required: true
        },
        'name': {
          required: true
        },
        'email': {
          required: true
        },
        'mobile': {
          required: true
        },
        'password': {
          required: true,
          minlength: 6,
          maxlength:16
        },
        'confirm_password': {
          required: true,
          equalTo: '#password'
        } 
      }
    });  
  });
</script>

@endsection