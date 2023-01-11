@extends('layouts.admin-panel')

@section('title')
    Coupon
@endsection

@section('content')

<div class="container">
    
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-4 pb-2 mb-3 border-bottom">
        <h1 class="h2">Coupon Category</h1>        
        @if(Auth::user()->role == 'Superadmin')
        <div class="btn-toolbar mb-2 mb-md-0">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#newCategory">
                <i class="bi bi-plus-lg"></i>New Category
            </button>
            <!-- Modal -->
            <div class="modal fade" id="newCategory" tabindex="-1" role="dialog" aria-labelledby="newCategoryLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header border-bottom-0">
                            <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
                        </div>
                        <form action="{{ url('store-category') }}" method="POST" enctype="multipart/form-data"> 
                            @csrf
                            <div class="form-group row px-4 pb-2">
                                <label for="name" class="col-sm-4 col-form-label">Category Name</label>
                                <div class="col-sm-8">
                                <input type="text" class="form-control" name="category_name" placeholder="Category Name" required>
                                </div>
                            </div>
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

    @if ($message = Session::get('addcategory'))
    <div class="alert alert-info alert-block">
        <strong>{{ $message }}</strong>
    </div>
    @endif

    @if ($message = Session::get('updatecategory'))
    <div class="alert alert-info alert-block">
        <strong>{{ $message }}</strong>
    </div>
    @endif

    @if ($message = Session::get('deletecategory'))
    <div class="alert alert-info alert-block">
        <strong>{{ $message }}</strong>
    </div>
    @endif
    
    <div class="row">
        
        <div class="col-md-12">
            @if(count($categories) > 0)
            <div class="table-responsive">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Category</th>
                            <th scope="col" class="text-center">Image</th>
                            <th scope="col" class="text-center"><i class="bi bi-sliders"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <th>{{ $category->category_name }}</th>
                            <td class="text-center">
                                @if ($category->img_name == null)
                                    <p>No Image</p>                                  
                                @else
                                    <img src="{{ $category->img_name }}" height="50rem" alt="coupon_category"></td>  
                                @endif
                            <td class="text-center">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#updateCategory{{ $category->id }}">
                                    <i class="bi bi-chevron-right"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="updateCategory{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="updateCategoryLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header border-bottom-0">
                                                <h5 class="modal-title" id="exampleModalLabel">Update Category</h5>
                                            </div>
                                            <form action="{{ url('edit-category') }}/{{ $category->id }}" method="POST" enctype="multipart/form-data"> 
                                                @csrf
                                                <div class="form-group row px-4 pb-2">
                                                    <label for="name" class="col-sm-4 col-form-label">Category Name</label>
                                                    <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="category_name" value="{{ $category->category_name }}" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row px-4">
                                                    <label for="image" class="col-sm-4 col-form-label">Upload Image</label>
                                                    <div class="col-sm-8">
                                                        <input class="form-control" name="img_name" type="file" id="formFile" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 text-end p-4">
                                                    <a href="{{ url('delete-category') }}/{{ $category->id }}" class="btn btn-outline-danger"><i class="bi bi-archive-fill"></i> Delete</a>
                                                    <button type="submit" class="btn btn-success"> <i class="bi bi-save"></i> Save</button>
                                                </div>
                                            </form>
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
              <p>There are no category to display.</p>
            @endif
            <div class="float-right pt-3">{{ $categories->links() }}</div>
        </div>
    </div>
    
</div>

@endsection