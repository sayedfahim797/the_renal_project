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
</head>

<body>
 <div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v">
    <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white rounded shadow-base">
        <div class="signin-logo tx-center tx-28 tx-bold tx-inverse">
            <span><img src="{{ url('public/backend/images/logo/atrytech.png') }}"></span>
        </div>
        <hr>

        <div class="tx-center tx-danger"><span class="tx-info"><h4><i>{{ __('Reset Password') }}</i></h4></span>
        </div>
        <hr>

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
        @csrf
            <div class="form-group">  
                <label for="email" class="text-md-right"><h6>{{ __('E-Mail Address') }}</h6></label>    
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus readonly>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div><!-- form-group -->
            <input type="submit" class="btn btn-info btn-block" value="{{ __('Send Password Reset Link') }}">
        </form>
    </div>
    <!-- login-wrapper -->
 </div>

<script src="{{ asset('public/backend') }}/login/lib/jquery/jquery.min.js"></script>
<script src="{{ asset('public/backend') }}/login/lib/jquery-ui/ui/widgets/datepicker.js"></script>
<script src="{{ asset('public/backend') }}/login/lib/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>