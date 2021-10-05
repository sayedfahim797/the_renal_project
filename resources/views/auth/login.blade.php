<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Mosaddek">
  <meta name="keyword" content="Atrytech Information Technology">

  <title>Atrytech | Atrytech Information Technology</title>

  <link rel="shortcut icon" href="{{ asset('public/backend') }}/images/favicon.png">
  <!-- vendor css -->
  <link href="{{ asset('public/backend') }}/login/lib/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="{{ asset('public/backend') }}/login/lib/ionicons/css/ionicons.min.css" rel="stylesheet">

  <!-- Bracket CSS -->
  <link rel="stylesheet" href="{{ asset('public/backend') }}/login/css/bracket.css">
  <!-- Toastr -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
</head>

<body>
  <div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v">
    <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white rounded shadow-base">
      <div class="signin-logo tx-center tx-28 tx-bold tx-inverse">  
        <span><img src="{{ url('public/backend/images/logo/atrytech.png') }}"></span>
      </div>
      <hr>
      <div class="tx-center tx-danger"><span class="tx-info"><h4><i>{{ __('Sign In') }}</i></h4></span>
      </div>
      <hr>               
      {!! Form::open(['url' => 'login', 'method' => 'post']) !!}
        <div class="form-group">
         <label for="email" class="text-md-right"><h6 class="tx-info">{{ __('E-Mail') }}</h6></label> 
           <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
            @enderror
        </div>
        <!-- form-group -->

        <div class="form-group">
          <label for="password" class="text-md-right"><h6 class="tx-info">{{ __('Password') }}</h6></label> 
          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
          @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
           @enderror

          <!-- Forgot-Password -->
          @if (Route::has('password.request'))

            <a href="{{ route('password.request') }}" class="tx-info tx-12 d-block mg-t-10">Forgot password?</a>

          @endif 
        </div>

        <!-- form-group -->
        <input type="submit" class="btn btn-info btn-block" value="{{ __('Sign In') }}">
      {!! Form::close() !!}
      <div class="mg-t-60 tx-center">© <a href="https://atrytech.com" class="tx-info" target="_blank">Atrytech Information Technology</a>
      </div>            
    </div>
    <!-- login-wrapper -->
  </div>

  <script src="{{ asset('public/backend') }}/login/lib/jquery/jquery.min.js"></script>
  <script src="{{ asset('public/backend') }}/login/lib/jquery-ui/ui/widgets/datepicker.js"></script>
  <script src="{{ asset('public/backend') }}/login/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Alart JS -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  
  <script>
    @if(Session::has('message'))
      var type="{{Session::get('alert-type','info')}}"

    
      switch(type){
            case 'info':
               toastr.info("{{ Session::get('message') }}");
               break;
            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;
            case 'error':
              toastr.error("{{ Session::get('message') }}");
              break;
      }
    @endif
 </script>
</body>
</html>
