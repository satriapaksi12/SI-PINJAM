@extends('layouts.app')

@section('title', 'Superadmin | Dashboard')

@include('component.navbar')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('component.sidebar')
            </div>
            <div class="col-md-9">
                <h1>Welcome </h1>
                <p>This is the dashboard page.</p>
                <div class="container">
                    <figure> @include('component.ikon_welcome')</figure>
                </div>
            </div>
        </div>
    </div>
@endsection
