@extends('layouts.app2')

@section('title', 'Alat')
@section('fitur', 'DAFTAR ALAT')
@section('link', '/alat')
@section('nama link', 'Alat')

@section('content')
@if (Session::has('status'))
<div class="alert alert-success"><i class="bi bi-check-circle"></i> {{ Session::get('message') }}</div>
@endif

@if (Session::has('status-edit'))
<div class="alert alert-warning"><i class="bi bi-check-circle"></i> {{ Session::get('message-edit') }}</div>
@endif
@if (Session::has('status-delete'))
<div class="alert alert-danger"><i class="bi bi-check-circle"></i> {{ Session::get('message-delete') }}</div>
@endif


<!-- Basic Tables start -->
<section class="section">
<div class="card">
    <div class="card-header">
        <a href="/alat-add" class="btn btn-primary">Add Data</a>
    </div>
    <div class="card-body">
        <table class="table" id="table1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>No Inventaris</th>
                    <th>Nama Alat</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($alat as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->no_inventaris }}</td>
                        <td>{{ $data->nama_alat }}</td>
                        {{-- <td>{{ $data->foto_alat->nama_foto }}</td>
                        <td>{{ $data->gedung->nama_gedung }} - {{ $data->gedung->lokasi->nama_lokasi }}</td> --}}
                        <td>
                            <a href="alat/{{ $data->id }}" class="btn icon btn-info"><i
                                class="bi bi-eye"></i></a>
                            <a href="alat-edit/{{ $data->id }}" class="btn icon btn-warning"><i
                                    class="bi bi-pencil"></i></a>
                            <form action="/alat-destroy/{{ $data->id }}" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <button
                                    onclick="return confirm('Apakah anda ingin menghapus data alat dengan No Inventaris {{ $data->no_inventaris }}  ')"
                                    class="btn icon btn-danger"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>

                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>

</section>
@endsection









