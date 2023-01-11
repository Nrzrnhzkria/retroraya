@extends('layouts.app')

@section('title')
    Organization
@endsection

@section('content')

<div class="container">
    <div class="row px-2">
        <h1 class="text-center border-bottom pt-5">Organizational Chart</h1>
        
        <div class="col-md-12 text-center pt-3">
            <img class="img-fluid" src="{{ asset('assets/img/about/organization.png') }}" style="width: 40rem">
        </div>
    </div>
</div>

@endsection