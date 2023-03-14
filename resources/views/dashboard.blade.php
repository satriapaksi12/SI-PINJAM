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
                <h1>Welcome Superadmin</h1>
                <p>This is the dashboard page.</p>
            </div>
        </div>
    </div>
@endsection


