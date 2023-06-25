@extends('layouts.auth2')

@section('title', 'Sekolah Vokasi | Login')

@section('content')
    <section class="signup">
        <!-- <img src="images/signup-bg.jpg" alt=""> -->
        <div class="container">
            <div class="signup-content">
                @if (Session::has('status'))
                    <div class="alert alert-danger" role="alert">
                        {{ Session::get('message') }}
                    </div>
                @endif
                <form method="post" class="register-form">
                    @csrf
                    <h2 class="form-title"> <span style="color: black;">SI</span>
                        <span style="color: orange;">PINJAM</span>
                    </h2>
                    <h1 class="text-center justify-content-center">LOGIN</h1>

                    <div class="form-group">
                        <input type="email" class="form-input" name="email" id="email" placeholder="Email" />
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-input" name="password" id="password" placeholder="Password" />
                        <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" id="submit" class="form-submit" value="Log in" />
                    </div>
                </form>
                <p class="loginhere">
                    Belum memiliki akun ? <a href="/register" class="loginhere-link">Buat Akun</a>
                </p>
            </div>
        </div>
    </section>

@endsection
