@extends('layouts.auth')

@section('title', 'Sekolah Vokasi | Register')

@section('content')
    <!-- Sign up form -->
    <section class="signup">
        <div class="container">
            <div class="signup-content">
                <style>
                    a.no-underline {
                        text-decoration: none;
                    }
                </style>
                <div class="signup-form">
                    <a href="/" class="no-underline">
                        <h2 class="form-title">Register</h2>
                    </a>
                    <form method="POST" class="register-form" id="register-form">
                        <div class="form-group">
                            <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="name" id="name" placeholder="Your Name" />
                        </div>
                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-email"></i></label>
                            <input type="email" name="email" id="email" placeholder="Your Email" />
                        </div>
                        <div class="form-group">
                            <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="pass" id="pass" placeholder="Password" />
                        </div>
                        <div class="form-group">
                            <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                            <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password" />
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all
                                statements in <a href="#" class="term-service">Terms of service</a></label>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="signup" id="signup" class="form-submit" value="Register" />
                        </div>
                    </form>
                </div>
                <div class="signup-image">
                    <figure> @include('component.ikon_register')</figure>
                    <span>Sudah memiliki akun ?<a href="/login"class="no-underline">Masuk Akun</a></span>
                </div>
            </div>
        </div>
    </section>
@endsection
