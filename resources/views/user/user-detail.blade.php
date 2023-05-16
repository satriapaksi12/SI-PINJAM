@extends('layouts.app2')

@section('title', 'Detail User')
@section('fitur', 'DETAIL USER')

@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">

                                <div class="form-body">
                                    <div class="row">
                                        <div class="my-3  mb-3 d-flex justify-content-center">
                                            @if ($user->nama_foto != '')
                                            <img  src="{{ asset($user->nama_foto) }}" width="100px"  alt="">
                                            @else
                                            <div class="avatar avatar-xl bg-primary me-3">
                                                <span class="avatar-content"><i class="bi bi-person-fill"></i></span>
                                            </div>
                                            @endif

                                        </div>
                                        <div class="col-md-4">
                                            <label>Nama</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" name="nama"id="nama"
                                                class="form-control" value="{{ $user->nama }}" placeholder="" readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Nomor Induk/NIP/NIM</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text"name="nomor_induk"id="nomor_induk"
                                                class="form-control" value="{{ $user->nomor_induk }}" placeholder="" readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Email</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="email" name="email"id="email"
                                                class="form-control" value="{{ $user->email }}" placeholder="" readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Unit</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" name="unit_id"id="unit_id"
                                                class="form-control" value="{{ $user->unit->nama_unit }}" placeholder="" readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Role</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" name="role_id"id="role_id"
                                                class="form-control" value="{{ $user->role->nama_role }}" placeholder="" readonly>
                                        </div>

                                    </div>
                                </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection

