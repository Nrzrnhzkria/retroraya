@extends('layouts.app')

@section('title')
    Events
@endsection

@section('content')

<div class="container">
    <div class="row px-2">
        <h1 class="text-center border-bottom pt-5">Events</h1>

        <div class="col-md-8 offset-md-2 pt-3">
            <div class="card mb-3">
                <img class="img-fluid" src="{{ asset('assets/img/events/1.png') }}">
            </div>
            <div class="card mb-3">
                <img class="img-fluid" src="{{ asset('assets/img/events/2.png') }}">
            </div>
            <div class="card mb-3">
                <img class="img-fluid" src="{{ asset('assets/img/events/3.png') }}">
            </div>
            <div class="card mb-3">
                <img class="img-fluid" src="{{ asset('assets/img/events/4.png') }}">
            </div>
            <div class="card">
                <img class="img-fluid" src="{{ asset('assets/img/events/5.png') }}">
            </div>
        </div>
    </div>
</div>

@endsection