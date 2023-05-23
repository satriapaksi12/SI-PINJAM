@extends('layouts.auth')

@section('title', 'Sekolah Vokasi | Login')

@section('content')
    <!-- Sing in  Form -->
    <section class="sign-in">
        <div class="container">
            <div class="signin-content">
                <div class="signin-image">
                    <figure> @include('component.ikon_login')</figure>
                    <span>Belum memiliki akun ?<a href="/register" class="no-underline">Buat Akun</a></span>
                </div>
                <style>
                    a.no-underline {
                        text-decoration: none;
                    }
                </style>
                <div class="signin-form">
                    <a href="/" class="no-underline">
                        <h2 class="form-title">Login</h2>
                    </a>
                    @if (Session::has('status'))
                        <div class="alert alert-danger" role="alert">
                            {{ Session::get('message') }}
                        </div>
                    @endif
                    <form method="post" class="register-form">
                        @csrf
                        <div class="form-group">
                            <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="email" id="email" placeholder="Email" />
                        </div>
                        <div class="form-group">
                            <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="password" id="password" placeholder="Password" />
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                            <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember
                                me</label>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" class="form-submit" value="Log in" />
                        </div>
                    </form>
                    <div class="social-login">
                        <span class="social-label">Or login with</span>
                        <ul class="socials">
                            <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                            <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                            <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
