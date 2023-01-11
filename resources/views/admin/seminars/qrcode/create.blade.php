@extends('layouts.admin-panel')

@section('title')
    Seminar
@endsection

@section('content')
<div class="container">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-4 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create New Seminar</h1>
    </div>

    <div class="row justify-content-center py-3">
        <div class="col-md-8">
            <div class="card p-3">
                <div class="card-body">
                    <form method="POST" action="{{ url('store-qr') }}" enctype="multipart/form-data">
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
                        
                        <div class="row mb-3">
                            <label for="seminar_name" class="col-md-4 col-form-label text-md-end">Seminar Name</label>

                            <div class="col-md-6">
                                <input id="seminar_name" type="text" class="form-control @error('seminar_name') is-invalid @enderror" name="seminar_name" required autofocus>

                                @error('seminar_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="location_name" class="col-md-4 col-form-label text-md-end">Location Name</label>

                            <div class="col-md-6">
                                <input id="location_name" type="text" class="form-control @error('location_name') is-invalid @enderror" name="location_name" required>

                                @error('location_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="max_participant" class="col-md-4 col-form-label text-md-end">Maximum participant</label>

                            <div class="col-md-6">
                                <input id="max_participant" type="number" class="form-control @error('max_participant') is-invalid @enderror" name="max_participant" required>

                                @error('max_participant')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="qr_value" class="col-md-4 col-form-label text-md-end">QR Value</label>

                            <div class="col-md-6">
                                <input id="qr_value" type="text" class="form-control @error('qr_value') is-invalid @enderror" name="qr_value" value="{{ $qr_value }}" readonly>

                                @error('qr_value')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                {{-- {!! QrCode::size(250)->generate('codingdriver.com'); !!} --}}
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="seminar_date" class="col-md-4 col-form-label text-md-end">Seminar Date</label>

                            <div class="col-md-6">
                                <input id="seminar_date" type="date" class="form-control @error('seminar_date') is-invalid @enderror" name="seminar_date" required>
                                
                                @error('seminar_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="time_start" class="col-md-4 col-form-label text-md-end">Time Start</label>

                            <div class="col-md-6">
                                <input id="time_start" type="time" class="form-control @error('time_start') is-invalid @enderror" name="time_start" required>

                                @error('time_start')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="time_end" class="col-md-4 col-form-label text-md-end">Time End</label>

                            <div class="col-md-6">
                                <input id="time_end" type="time" class="form-control @error('time_end') is-invalid @enderror" name="time_end" required>

                                @error('time_end')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="img_name" class="col-md-4 col-form-label text-md-end">Upload Image</label>

                            <div class="col-md-6">
                                <input id="img_name" class="form-control @error('img_name') is-invalid @enderror" name="img_name" type="file" id="formFile" required>
                                
                                @error('img_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Create
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
