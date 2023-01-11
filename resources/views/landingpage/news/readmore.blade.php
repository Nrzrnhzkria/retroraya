@extends('layouts.app')

@section('title')
    News
@endsection

@section('content')

<div class="container">
    <div class="row px-2">
        <h1 class="text-center border-bottom pt-5">{{ $news->title }}</h1>
        
        <div class="col-md-12 pt-3">
            <div class="card px-4 py-4">
                <div class="row pb-4">
                    <div class="col-md-12 text-center">        
                        <img class="img-fluid" src="{{ $news->img_name }}" style="width:50rem" alt="">
                    </div>
                </div>

                <p class="text-justify">{!! $news->content !!}</p>
            </div>
        </div>
    </div>
</div>

@endsection