<!doctype html>
<html lang="en">
    <head>
        <title>Herbs of Africa | Reset Password</title>
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
                            <h3 class="text-center mb-4">Password Reset</h3>
                            <form action="{{ route('password.store') }}" class="login-form" method="POST">
                                @csrf
                                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                                <div class="form-group">
                                    <input type="email" name="email" value="{{old('email', $request->email)}}" required autofocus autocomplete="username" class="form-control rounded-left" placeholder="Enter Email" required>

                                    @error('email')
                                        <div class="error" style="color: red">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!-- Password -->
                                <div class="form-group">
                                    <input id="password" class="form-control rounded-left"
                                                    type="password"
                                                    name="password"
                                                    placeholder="Password"
                                                    required autocomplete="new-password" />

                                    @error('password')
                                        <div class="error" style="color: red">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Confirm Password -->
                                <div class="form-group">
                                    <input id="password_confirmation" class="form-control rounded-left"
                                                    type="password"
                                                    name="password_confirmation"
                                                    placeholder="Password Confirmation"
                                                    required autocomplete="new-password" />

                                    @error('password_confirmation')
                                        <div class="error" style="color: red">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary rounded submit px-3">{{ __('Reset Password') }}</button>
                                </div>
                                <div class="form-group d-md-flex">
                                    
                                    <div class="w-50 text-md-right">
                                        <a href="{{ route('login') }}">Login</a>
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

