<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="Atrytech Information Technology">

    <title>Admin Change PassworD | Atrytech Information Technology</title>

    <link rel="shortcut icon" href="{{ asset('public/backend') }}/images/favicon.png">
    <!-- vendor css -->
    <link href="{{ asset('public/backend') }}/login/lib/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('public/backend') }}/login/lib/ionicons/css/ionicons.min.css" rel="stylesheet">

    <!-- Bracket CSS -->
    <link rel="stylesheet" href="{{ asset('public/backend') }}/login/css/bracket.css">
</head>

<body>
    <div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v">
        <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white rounded shadow-base">
            <div class="signin-logo tx-center tx-28 tx-bold tx-inverse">  
              <span><img src="{{ url('public/backend/images/logo/atrytech.png') }}"></span>
            </div>
            <hr>
            <div class="tx-center tx-danger"><span class="tx-info"><h4><i>{{ __('Change PassworD') }}</i></h4></span>
            </div>
            <hr>
             @if (session('successMsg'))
             <div class="tx-center mg-b-60 alert alert-success alert-dismissible fade show" role="alert">
                 <strong>Great ! </strong>{{ session('successMsg') }}
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             @endif
           

            <form method="POST" action="{{ route('adminPasswordUpdate') }}">
               @csrf
                <div class="form-group">
                 <label for="email" class="text-md-right"><h6 class="tx-info">{{ __('Old Password') }}</h6></label> 
                   <input id="oldpass" type="password" class="form-control @error('oldpass') is-invalid @enderror" name="oldpass" value="{{ $oldpass ?? old('oldpass') }}" required autocomplete="oldpass" autofocus>
                    @error('oldpass')
                            <span class="invalid-feedback" role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                    @enderror
                </div>
                <!-- form-group -->

                <div class="form-group">
                    <label for="password" class="text-md-right"><h6 class="tx-info">{{ __('Password') }}</h6></label> 
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                      @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong class="text-danger">{{ $message }}</strong>
                          </span>
                      @enderror 
                </div>

                <div class="form-group">
                    <label for="password" class="text-md-right"><h6 class="tx-info">{{ __('Confirm Password') }}</h6></label> 
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">  
                </div>
                <!-- form-group -->

                <input type="submit" class="btn btn-info btn-block" value="{{ __('Reset Password') }}">
            </form>

            <div class="mg-t-40 tx-center">
                @if(Auth::user()->role_id==3)
                    <i class="fa fa-home"></i> <a href="{{ route('admin') }}" class="tx-info" target="_blank">Home</a>
                @elseif (Auth::user()->role_id==2)  
                <i class="fa fa-home"></i> <a href="{{ route('doctor') }}" class="tx-info" target="_blank">Home</a>
                @else  
                <i class="fa fa-home"></i> <a href="{{ route('staff') }}" class="tx-info" target="_blank">Home</a>
                @endif
            </div>            
        </div>
        <!-- login-wrapper -->
    </div>

    <script src="{{ asset('public/backend') }}/login/lib/jquery/jquery.min.js"></script>
    <script src="{{ asset('public/backend') }}/login/lib/jquery-ui/ui/widgets/datepicker.js"></script>
    <script src="{{ asset('public/backend') }}/login/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    
</body>

</html>
