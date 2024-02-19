<!doctype html>
<html lang="en">
    <head>
        <title>Havron | Forgot Password</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&amp;display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('auth/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('auth/css/style.css')}}">
    </head>
    <body>
        <section class="ftco-section">
            <div class="container">
                {{-- <div class="row justify-content-center">
                    <div class="col-md-6 text-center mb-5">
                        <h2 class="heading-section">Login #01</h2>
                    </div>
                </div> --}}
                <div class="row justify-content-center">
                    <div class="col-md-7 col-lg-5">
                        <div class="login-wrap p-4 p-md-5">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="fa fa-user-o"></span>
                            </div>
                            <h3 class="text-center mb-4">Forgot Password</h3>
                            @if(session('status'))
                            <div class="mb-4 text-success">{{session('status')}}</div>
                            @endif
                            <form action="{{ route('password.email') }}" class="login-form" method="POST">
                                @csrf
                                <div class="mb-4 text-sm text-gray-600">
                                    {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" value="{{old('email')}}" class="form-control rounded-left" autocomplete="username" placeholder="Enter Email" required>

                                    @error('email')
                                        <div class="error" style="color: red">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary rounded submit px-3">
                                        {{ __('Email Password Reset Link') }}
                                    </button>
                                </div>
                                <div class="form-group d-md-flex">
                                    
                                    <div class="w-50 text-md-right">
                                        <a href="{{route('login')}}">Login</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- <script src="{{asset('js/jquery.min.js')}}"></script>
        <script src="{{asset('js/popper.js')}}"></script>
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
        <script src="{{asset('js/main.js')}}"></script> --}}
    </body>
</html>

