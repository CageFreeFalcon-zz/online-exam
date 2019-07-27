@extends('student.layouts.logintemplet')

@section('content')
    <section class="signup">
        <div class="container">
            <div class="signup-content">
                <div class="signup-form">
                    <h2 class="form-title">Sign up</h2>
                    <form method="POST" class="register-form" action="{{ route('student.register') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="name" id="name" placeholder="Your Name" value="{{ old('name') }}"
                                   required autofocus/>
                        </div>
                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-email"></i></label>
                            <input type="email" name="email" id="email" placeholder="Your Email"
                                   value="{{ old('email') }}" required/>
                        </div>
                        <div class="form-group">
                            <label for="password"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="password" id="password" placeholder="Password" required/>
                        </div>
                        <div class="form-group">
                            <label for="password-confirm"><i class="zmdi zmdi-lock-outline"></i></label>
                            <input id="password-confirm" type="password" name="password_confirmation"
                                   placeholder="Repeat your password" required/>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" class="form-submit" value="Register"/>
                        </div>
                    </form>
                </div>
                <div class="signup-image">
                    <figure><img src="{{asset('images/signup-image.jpg')}}" alt="sing up image"></figure>
                    <a href="{{route('student.login')}}" class="signup-image-link">I am already member</a>
                </div>
            </div>
        </div>
    </section>
@endsection
