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
                    <a href="" class="no-underline">
                        <h2 class="form-title">Register</h2>
                    </a>
                    <form method="POST" action="register" class="register-form">
                        @csrf
                        <div class="form-group">
                            <label for="Nama"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="nama" id="nama" placeholder="Nama" />
                        </div>
                        <div class="form-group">
                            <label for="Nomor Induk"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="nomor_induk" id="nomor_induk" placeholder="Nomor Induk" />
                        </div>
                        <div class="form-group">
                            <label for="Email"><i class="zmdi zmdi-email"></i></label>
                            <input type="email" name="email" id="email" placeholder="Email" />
                        </div>
                        <div class="form-group">
                            <label for="Password"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="password" id="password" placeholder="Password" />
                        </div>
                        <div class="form-group">
                            <label for="Nama Unit"><i class="zmdi zmdi-lock-outline"></i></label>

                                <select class="form-select" name="unit_id" id="unit_id">
                                    @foreach ($unit as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_unit }} </option>
                                    @endforeach
                                </select>

                        </div>

                        <div class="form-group form-button">
                            <input type="submit"  class="form-submit" value="Register" />
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
