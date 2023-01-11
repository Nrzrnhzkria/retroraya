@extends('layouts.admin-panel')

@section('title')
    Banners
@endsection

@section('content')

<div class="container">
    
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-4 pb-2 mb-3 border-bottom">
        <h1 class="h2">Banners</h1>        
        @if(Auth::user()->role == 'Superadmin')
        <div class="btn-toolbar mb-2 mb-md-0">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#newBanner">
                <i class="bi bi-plus-lg"></i>New Banner
            </button>
            <!-- Modal -->
            <div class="modal fade" id="newBanner" tabindex="-1" role="dialog" aria-labelledby="newBannerLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header border-bottom-0">
                            <h5 class="modal-title" id="exampleModalLabel">Add New Banner</h5>
                        </div>
                        <form action="{{ url('store-banner') }}" method="POST" enctype="multipart/form-data"> 
                            @csrf
                            <div class="form-group row px-4">
                                <label for="image" class="col-sm-4 col-form-label">Upload Image</label>
                                <div class="col-sm-8">
                                    <input class="form-control" name="img_name" type="file" id="formFile" required>
                                </div>
                            </div>
                            <div class="col-md-12 text-end p-4">
                                <button type="submit" class="btn btn-success"> <i class="bi bi-save"></i> Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @else
        @endif
    </div>

    @if ($message = Session::get('addbanner'))
    <div class="alert alert-info alert-block">
        <strong>{{ $message }}</strong>
    </div>
    @endif

    @if ($message = Session::get('deletebanner'))
    <div class="alert alert-info alert-block">
        <strong>{{ $message }}</strong>
    </div>
    @endif
    
    <div class="row">
        
        <div class="col-md-12">
            @if(count($banners) > 0)
            <div class="table-responsive">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Banner</th>
                            <th scope="col" class="text-center"><i class="bi bi-sliders"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($banners as $banner)
                        <tr>
                            <td><img src="{{ $banner->img_name }}" height="50rem" alt="banner"></td>  
                            <td class="text-center">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $banner->id }}"><i class="bi bi-trash"></i></button>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{ $banner->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-start">
                                        Are you sure you want to delete this banner ?
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <a class="btn btn-danger" href="{{ url('delete-banner') }}/{{ $banner->id }}">Delete</a>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </td>
                        </tr>                         
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
              <p>There are no banner to display.</p>
            @endif
            <div class="float-right pt-3">{{ $banners->links() }}</div>
        </div>
    </div>
    
</div>

@endsection