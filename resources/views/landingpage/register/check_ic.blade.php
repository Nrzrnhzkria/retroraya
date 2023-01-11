@extends('layouts.app')

@section('title')
    Register
@endsection

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-md-12 px-2 pt-5 text-center">
            <img class="img-fluid" src="{{ asset('assets/img/hun.png') }}" style="max-width:200px">
            {{-- <h1 class="display-4 text-dark px-4 pt-3">{{ $product->name }}</h1> --}}
        </div>
    </div>

    <div class="row p-5">
        <div class="col-md-6 offset-md-3">
            <div class="card shadow">
                <div class="card-body">
                    <div>Please enter IC No. / Passport</div>
                    <em class="pb-3" style="font-size: 10pt;">Sila masukkan No. Kad Pengenalan/Pasport</em>
                    <form action="verification" method="get">
                        @csrf
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="ic_no" placeholder="without '-'" maxlength="12" required="" >
                            <p style="font-size: 10pt; color:#202020; text-align: left;"><em>Ex.: 91042409**** / A********</em></p>
                        </div>
                        <div class="row">
                            <div class="col-md-6 text-start">                                    
                                <a href="/booth-information" class="btn btn-link" style="padding-left: 0;"><i class="bi bi-info-circle-fill"></i> Booth Information</a>
                            </div>
                            <div class="col-md-6 text-end"> 
                                <button type="submit" class="btn btn-warning fw-bold">Next</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection