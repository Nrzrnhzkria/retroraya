@extends('layouts.admin-panel')

@section('title')
    Coupon
@endsection

@section('content')
{{-- <style>
.card:hover{
    box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.2);    
    transform: scale(1.01);
}
</style> --}}

<div class="container">

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-4 pb-2 mb-3 border-bottom">
        <h1 class="h2">Update Coupon</h1>
    </div>

    <div class="row justify-content-center py-3">
        <div class="col-md-12">
            <div class="card p-3">
                <div class="card-body">
                    <div class="row p-3">
       
                        @if(count($coupons) > 0)
                        @foreach ($coupons as $coupon)
                            @if ($vendor->id == $coupon->vendor_id)
                            <div class="col-md-4">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-light p-0">
                                        <a href="{{ $coupon->img_name }}" class="text-dark text-decoration-none">
                                            <div class="row g-0">
                                              <div class="col-md-4">
                                                <img src="{{ $coupon->img_name }}" class="img-fluid rounded-start" style="height: 100%" alt="coupon">
                                              </div>
                                              <div class="col-md-8">
                                                <div class="card-body py-0">
                                                    <p class="fw-bold pt-2">{{ $coupon->category }}</p>
                                                </div>
                                              </div>
                                            </div>
                                        </a>
                                    </button>
                                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $vendor->id }}"><i class="bi bi-trash"></i></button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{ $vendor->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure you want to delete this coupon ?</p>
                                                    <p>This table may be affected after deletion :</p>
                                                    <ul>
                                                        <li>Coupon</li>
                                                        <li>Redeem</li>
                                                    </ul>
                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <a class="btn btn-danger" href="{{ url('delete-coupon') }}/{{ $coupon->id }}">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="card shadow mb-3">
                                    <a href="{{ $coupon->img_name }}" class="text-dark text-decoration-none">
                                    <div class="row g-0">
                                      <div class="col-md-4">
                                        <img src="{{ $coupon->img_name }}" class="img-fluid rounded-start" alt="...">
                                      </div>
                                      <div class="col-md-8">
                                        <div class="card-body py-0">
                                            <p class="fw-bold pt-2">{{ $coupon->category }}</p>
                                            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $vendor->id }}"><i class="bi bi-trash"></i></button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal{{ $vendor->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Are you sure you want to delete this coupon ?</p>
                                                            <p>This table may be affected after deletion :</p>
                                                            <ul>
                                                                <li>Coupon</li>
                                                                <li>Redeem</li>
                                                            </ul>
                                                        </div>
                                                        <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <a class="btn btn-danger" href="{{ url('delete-coupon') }}/{{ $coupon->id }}">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                      </div>
                                    </div>
                                    </a>
                                </div> --}}
                            </div>
                            @endif
                        @endforeach
                        @else
                          <p>There are no coupon to display.</p>
                        @endif
                        
                    </div>
                    
                    {{-- <form action="{{ url('edit-coupon') }}/{{ $coupons->id }}" method="POST" id="dynamic_form" enctype="multipart/form-data"> 
                        @csrf
                        <div class="col-md-12 text-center mb-3">
                                <img src="{{ $coupons->img_name }}" width="300rem">
                        </div>

                        <div class="row g-2 mb-3">
                            <div class="col-md-6">
                                <label>Vendor ID</label>                 
                                <input name="vendor_id" type="text" value="{{ $coupons->vendor_id }}" class="form-control" readonly>
                            </div>

                            <div class="col-md-6">
                                <label for="img_name">Replace Image</label>
                                <input class="form-control" name="img_name" value="{{ $coupons->img_name }}" type="file" id="formFile">
                            </div>
                        </div>
                    
                        <div class="col-md-12 mb-3">
                            <label for="teaser">Coupon No.</label>        
                            <input name="coupon_no" type="text" value="{{ $coupons->coupon_no }}" class="form-control" readonly>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="teaser">Category</label>        
                            <input name="category" type="text" value="{{ $coupons->category }}" class="form-control" >
                        </div>
                            
                        <div class="col-md-12 text-end">
                            <button type="submit" class="btn btn-primary">
                                Update Coupon
                            </button>
                            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $coupons->id }}"><i class="bi bi-trash"></i></button>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{ $coupons->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        Are you sure you want to delete this coupon ?
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <a class="btn btn-danger" href="{{ url('delete-coupon') }}/{{ $coupons->id }}">Delete</a>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                        </div>
                        
                    </form> --}}

                </div>
            </div>
        </div>
    </div>
 
</div>

@endsection