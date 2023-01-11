@extends('layouts.admin-panel')

@section('title')
    Coupon
@endsection

@section('content')

<div class="container">
    
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-4 pb-2 mb-3 border-bottom">
        <h1 class="h2">Coupon</h1>
        @if(Auth::user()->role == 'Superadmin')
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
              <a href="/view-category" class="btn btn-outline-dark"><i class="bi bi-eye-fill"></i> View Category</a>
            </div>
        </div>
        @else
        @endif
    </div>

    @if ($message = Session::get('updatecoupon'))
    <div class="alert alert-info alert-block">
        <strong>{{ $message }}</strong>
    </div>
    @endif

    @if ($message = Session::get('deletecoupon'))
    <div class="alert alert-info alert-block">
        <strong>{{ $message }}</strong>
    </div>
    @endif
    
    <div class="row">
        
        <div class="col-md-12">
            @if(count($vendors) > 0)
            <div class="table-responsive">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            {{-- <th scope="col">#</th> --}}
                            <th scope="col">Vendor</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone No</th>
                            <th scope="col" class="text-center"><i class="bi bi-sliders"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vendors as $vendor)
                        {{-- @foreach ($details as $detail) --}}
                        {{-- @foreach ($payments as $payment) --}}
                        {{-- @if ($vendor->id == $detail->user_id) --}}
                        {{-- @if ($payment->payer_id == $vendor->id) --}}
                        <tr>
                            {{-- <th scope="row">{{ $count++ }}</th> --}}
                            <th>{{ $vendor->name }}</th>
                            <td>{{ $vendor->email }}</td>
                            <td>{{ $vendor->phone_no }}</td>
                            <td class="text-center">
                                <a href="{{ url('update-coupon') }}/{{ $vendor->id }}" class="btn btn-dark"><i class="bi bi-chevron-right"></i></a>
                            </td>
                        </tr>        
                        {{-- @endif        
                        @endif                           
                        @endforeach                        
                        @endforeach--}}                     
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
              <p>There are no vendor to display.</p>
            @endif
            <div class="float-right pt-3">{{ $vendors->links() }}</div>
        </div>
    </div>
    
</div>

@endsection