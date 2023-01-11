@extends('layouts.admin-panel')

@section('title')
    News
@endsection

@section('content')

<div class="container">

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-4 pb-2 mb-3 border-bottom">
        <h1 class="h2">Update News</h1>
    </div>

    <div class="row justify-content-center py-3">
        <div class="col-md-8">
            <div class="card p-3">
                <div class="card-body">
                    
                    <form action="{{ url('edit-news') }}/{{ $news->id }}" method="POST" id="dynamic_form" enctype="multipart/form-data"> 
                        @csrf
                        
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="px-3">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        
                        <div class="col-md-12 text-center mb-3">
                            <img src="{{ $news->img_name }}" width="300rem">
                        </div>

                        <div class="row g-2 mb-3">
                            <div class="col-md-6">
                                <label for="title">Title</label>                 
                                <input name="title" type="text" value="{{ $news->title }}" class="form-control" required>
                            </div>

                            <div class="col-md-6">
                                <label for="img_name">Replace Image</label>
                                <input class="form-control" name="img_name" value="{{ $news->img_name }}" type="file" id="formFile">
                            </div>
                        </div>
                    
                        <div class="col-md-12 mb-3">
                            <label for="teaser">Teaser</label>
                            <textarea type="text" class="form-control" placeholder="This teaser will be shown in landing page"  name="teaser">{{ $news->teaser }}</textarea>
                        </div>
                        
                        <div class="col-md-12 mb-3">
                            <label for="content">Content</label>
                            <textarea name="content" class="ckeditor form-control" id="exampleFormControlTextarea1" rows="3">{{ $news->content }}</textarea>
                        </div>
                            
                        <div class="col-md-12 text-end">
                            <button type="submit" class="btn btn-primary">
                                Update News
                            </button>
                            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $news->id }}"><i class="bi bi-trash"></i></button>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{ $news->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        Are you sure you want to delete this news ?
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <a class="btn btn-danger" href="{{ url('delete-news') }}/{{ $news->id }}">Delete</a>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                        </div>
                        
                    </form>

                </div>
            </div>
        </div>
    </div>
 
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>   

@endsection