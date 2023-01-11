@extends('layouts.admin-panel')

@section('title')
    Media
@endsection

@section('content')

<div class="container">
    
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-4 pb-2 mb-3 border-bottom">
        <h1 class="h2">Media</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
              <a href="/create-media" class="btn btn-outline-dark"><i class="bi bi-plus-lg"></i> Add Media</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('addmedia'))
    <div class="alert alert-info alert-block">
        <strong>{{ $message }}</strong>
    </div>
    @endif

    @if ($message = Session::get('updatemedia'))
    <div class="alert alert-info alert-block">
        <strong>{{ $message }}</strong>
    </div>
    @endif

    @if ($message = Session::get('deletemedia'))
    <div class="alert alert-info alert-block">
        <strong>{{ $message }}</strong>
    </div>
    @endif
    
    <div class="row">
        
        <div class="col-md-12">
            <div class="float-right pt-3">{{ $medias->links() }}</div>
            @if(count($medias) > 0)
            <div class="table-responsive">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            {{-- <th scope="col">#</th> --}}
                            <th scope="col">Title</th>
                            <th scope="col">Image</th>
                            <th scope="col" class="text-center"><i class="bi bi-sliders"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($medias as $key => $media)
                        <tr>
                            {{-- <th scope="row">{{ $medias->firstItem() + $key }}</th> --}}
                            <th>{{ $media->title }}</th>
                            <td><img src="{{ $media->img_name }}" width="80rem"></td>
                            <td class="text-center">
                                <a href="{{ url('update-media') }}/{{ $media->id }}" class="btn btn-dark"><i class="bi bi-chevron-right"></i></a>
                            </td>
                        </tr>                
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
              <p>There are no news to display.</p>
            @endif
        </div>
    </div>
    
</div>

@endsection