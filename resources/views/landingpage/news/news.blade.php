@extends('layouts.app')

@section('title')
    News
@endsection

@section('content')

<style>
.card:hover{
    box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.2);    
    transform: scale(1.01);
    background-color: orange;
}
</style>

<div class="container">
    <div class="row px-2">
        <h1 class="text-center border-bottom pt-5">News</h1>
        
        @foreach ($news as $new)
        <div class="col-md-12 pt-3">
            <a href="{{ url('news') }}/{{ $new->id }}" class="text-dark text-decoration-none">
                <div class="card shadow mb-3">
                    <div class="row g-0">
                        <div class="col-md-2">
                            <img src="{{ $new->img_name }}" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-10">
                            <div class="card-body">
                                <h5 class="card-title">{{ $new->title }}</h5>
                                <p class="card-text">{{ $new->teaser}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>

@endsection