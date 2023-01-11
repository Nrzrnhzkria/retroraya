@extends('layouts.app')

@section('title')
    Register
@endsection

@section('content')
<div class="container">
    <div class="row p-5">
        <div class="text-center">
        <h3>You have been registered successfully!</h3>
        <div class="py-3" style="font-size: 10rem; color: green;">
            <i class="bi bi-check2-circle"></i>
        </div>
        <hr>
        <p> The receipt will be send to your registered email address in 24 hours. Thank you for your patient.</p>
    </div>
</div>
@endsection