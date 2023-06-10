@extends('layouts.app2')

@section('title', 'Edit User')
@section('fitur', 'EDIT USER')

@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form action="/user/{{ $user->id }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Nama</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" name="nama"id="nama"
                                                value="{{ $user->nama }}" class="form-control" placeholder="">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Nomor Induk/NIP/NIM</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text"name="nomor_induk"id="nomor_induk"
                                            value="{{ $user->nomor_induk }}" class="form-control" placeholder="">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Email</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="email" name="email"id="email"
                                            value="{{ $user->email }}" class="form-control" placeholder="">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Role</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <fieldset class="form-group">
                                                <select class="form-select" name="role_id" id="role_id">

                                                    @foreach ($role as $item)
                                                        <option value="{{ $item->id }}" {{ $user->role_id == $item->id? 'selected':''}} >{{ $item->nama_role }}</option>
                                                    @endforeach
                                                </select>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Unit</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <fieldset class="form-group">
                                                <select class="form-select" name="unit_id" id="unit_id">
                                                    @foreach ($unit as $item)
                                                        <option value="{{ $item->id }}"{{ $user->unit_id == $item->id? 'selected':''}}>{{ $item->nama_unit }} </option>
                                                    @endforeach
                                                </select>
                                            </fieldset>
                                        </div>
                                       
                                        <div class="col-sm-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Update</button>
                                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection

