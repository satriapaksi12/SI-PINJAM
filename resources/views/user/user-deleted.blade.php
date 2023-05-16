@extends('layouts.app2')

@section('title', 'User Non Aktif')
@section('fitur', 'USER NON AKTIF')
@section('link', '/user-non-aktif')
@section('nama link', 'User Non Aktif')


@section('content')







    <!-- Basic Tables start -->
    <section class="section">
        <div class="card">

            <div class="card-body">
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor Induk</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Unit</th>
                            <th>Role</th>
                            <th>Tanggal Dinonaktifkan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($deletedUser as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->nomor_induk }}</td>
                                <td>{{ $data->nama }}</td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->unit->nama_unit}}</td>
                                <td>{{ $data->role->nama_role}}</td>
                                <td>{{ $data->deleted_at }}</td>
                                <td>

                                    <a href="/user/{{ $data->id }}/restore" class="btn icon btn-primary"><i
                                            class="bi bi-arrow-counterclockwise"></i></a>
                                </td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

    </section>
    <!-- Basic Tables end -->

@endsection
