@extends('student.layouts.logintemplet')

@section('content')
    <section class="sign-in">
        <div class="container">
            <div class="signin-content">
                <div class="signin-image">
                    <figure><img src="{{asset('images/signin-image.jpg')}}" alt="sing up image"></figure>
                </div>
                <div class="signin-form">
                    <h2 class="form-title">Sign up</h2>
                    <form method="POST" class="register-form" id="login-form" action="{{ route('student.login') }}">
                        @csrf
                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="email" name="email" id="email" placeholder="Your Email"
                                   value="{{ old('email') }}"
                                   required autofocus/>
                        </div>
                        <div class="form-group">
                            <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                            <input id="password" type="password" name="password" required placeholder="Password"/>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="remember" id="remember"
                                   class="agree-term" {{ old('remember') ? 'checked' : '' }}/>
                            <label for="remember" class="label-agree-term"><span><span></span></span>Remember
                                me</label>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" class="form-submit" value="Log in"/>
                        </div>
                    </form>
                    <a href="{{route('student.password.request')}}" class="signup-image-link">Forget Password ?</a>
                    <a href="{{route('student.register')}}" class="signup-image-link" style="margin-top: 0">Create an account</a>
                </div>
            </div>
        </div>
    </section>
@endsection
