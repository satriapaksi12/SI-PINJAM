@extends('layouts.auth2')

@section('title', 'Sekolah Vokasi | Register')

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
                <form method="POST" action="register" class="register-form">
                    @csrf
                    <h2 class="form-title"> <span style="color: black;">SI</span>
                        <span style="color: orange;">PINJAM</span>
                    </h2>
                    <h1 class="text-center justify-content-center">Register</h1>
                    <div class="form-group">
                        <input type="text" class="form-input" name="nama" id="nama" placeholder="Nama" required/>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-input" name="nomor_induk" id="nomor_induk"
                            placeholder="Nomor Induk" required/>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-input" name="email" id="email" placeholder="Email" required/>
                        <p class="email-format-small">Format email harus sesuai dengan @staff.uns.ac.id atau
                            @student.uns.ac.id</p>
                    </div>
                    <style>
                        .email-format-small {
                            font-size: 12px;
                            /* Atur ukuran font sesuai keinginan */
                        }
                    </style>
                    <div class="form-group">
                        <input type="password" class="form-input" name="password" id="password" placeholder="Password" required />
                        <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                    </div>
                    <div class="form-group">
                        <select class="form-input" name="unit_id" id="unit_id">
                            <option value="">Pilih salah satu unit</option>
                            @foreach ($unit as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_unit }} </option>
                            @endforeach
                        </select>
                        <span toggle="#password" <span class="zmdi zmdi-caret-down field-icon toggle-password"></span>

                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" id="submit" class="form-submit" value="Register" />
                    </div>
                </form>
                <p class="loginhere">
                    Sudah memiliki akun ?<a href="/login" class="loginhere-link">Masuk Akun</a>
                </p>
            </div>
        </div>
    </section>

@endsection
