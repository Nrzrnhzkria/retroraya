@extends('layouts.app')

@section('title')
    Booth
@endsection

@section('content')

<div class="container">
    <div class="row px-2">
        <h1 class="text-center border-bottom pt-5">Booth</h1>

        <div class="col-md-8 offset-md-2 pt-3">
            <div class="card mb-3">
                <img class="img-fluid" src="{{ asset('assets/img/layout/1.png') }}">
            </div>
            <div class="card mb-3">
                <img class="img-fluid" src="{{ asset('assets/img/layout/2.png') }}">
            </div>
            <div class="card mb-3">
                <img class="img-fluid" src="{{ asset('assets/img/layout/3.png') }}">
            </div>
            <div class="card mb-3">
                <img class="img-fluid" src="{{ asset('assets/img/layout/4.png') }}">
            </div>
            <div class="card mb-3">
                <img class="img-fluid" src="{{ asset('assets/img/layout/5.png') }}">
            </div>
            <div class="card mb-3">
                <img class="img-fluid" src="{{ asset('assets/img/layout/6.png') }}">
            </div>
            <div class="card mb-3">
                <img class="img-fluid" src="{{ asset('assets/img/layout/7.png') }}">
            </div>
        </div>

        <div class="col-md-12 pt-3">
            @foreach ($booth as $booths)
                <div class="table-responsive">
                    <table class="table table-bordered table-sm">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{ $booths->booth_name }}</th>
                                <th scope="col">Lot Placement</th>
                                <th scope="col">Price (RM)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($booth_details as $booth_detail)                                                    
                            @if ($booths->booth_id == $booth_detail->booth_id)    
                            <tr>
                                <th scope="row">{{ $count++ }}</th>
                                <td>{{ $booth_detail->booth_type }}</td>
                                <td>{{ $booth_detail->lot_placement }}</td>
                                <td>{{ number_format($booth_detail->price) }}</td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endforeach
            
            <div class="col-auto text-center pt-2">
                <h3>Register as a vendor now!</h3>
                <br>
                <a href="/registration" class="btn btn-warning fw-bold"><i class="bi bi-people-fill"></i> Vendor Registration</a>
            </div>
        </div>
        
    </div>
</div>

@endsection