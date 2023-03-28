@extends('layouts.app2')

@section('title', 'Edit Periode')
@section('fitur', 'EDIT PERIODE')


@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">

                    <div class="card-content">
                        <div class="card-body">
                            <form action="/periode/{{ $periode->id }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Tahun Periode</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="number" name="tahun_periode"id="tahun_periode"
                                                class="form-control" value="{{ $periode->tahun_periode }}" placeholder="">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Semester</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <fieldset class="form-group">
                                                <select class="form-select" name="semester" id="semester">
                                                    <option value="{{ $periode->semester }}">{{ $periode->semester }}
                                                    </option>
                                                    @if ($periode->semester == 'Ganjil')
                                                        <option value="Genap">Genap</option>
                                                    @else
                                                        <option value="Ganjil">Ganjil</option>
                                                    @endif
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



