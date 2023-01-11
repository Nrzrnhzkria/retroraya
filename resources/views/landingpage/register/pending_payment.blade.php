@extends('layouts.app')

@section('title')
    Register
@endsection

@section('content')
<div class="container">
    <div class="row p-5">
        <div class="text-center">
            <h3>Your payment is still pending!</h3>
            {{-- <h3>Bill ID : {{ $payment->senangpay_id }}</h3> --}}
            <div class="py-3" style="font-size: 10rem; color: red;">
                <i class="bi bi-x-circle"></i>
            </div>
            <p>Click button below if you wish to proceed the payment</p>
            <hr>
            <a href="https://toyyibpay.com/{{ $payment->toyyib_billcode }}" class="btn btn-lg btn-warning fw-bold">Proceed</a>
        {{-- <p> Please feel free to contact us and show the <b>Bill ID</b> if you wish to proceed the payment, thank you.</p> --}}
        </div>
    </div>
</div>
@endsection