@extends('layouts.admin-panel')

@section('title')
    Booth
@endsection

@section('content')
<div class="container">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-4 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create New Details</h1>
    </div>

    <div class="row justify-content-center py-3">
        <div class="col-md-8">
            <div class="card p-3">
                <div class="card-body">
                    <form method="POST" action="{{ url('store-booth-details') }}/{{ $booth->booth_id }}">
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
                            <label for="booth_type" class="col-md-4 col-form-label text-md-end">Booth Type</label>

                            <div class="col-md-6">
                                <input id="booth_type" type="text" class="form-control @error('booth_type') is-invalid @enderror" name="booth_type" required autofocus>

                                @error('booth_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="lot_placement" class="col-md-4 col-form-label text-md-end">Lot Placement</label>

                            <div class="col-md-6">
                                <input id="lot_placement" type="text" class="form-control @error('lot_placement') is-invalid @enderror" name="lot_placement" required>

                                @error('lot_placement')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="price" class="col-md-4 col-form-label text-md-end">Price (RM)</label>
                            
                            <div class="col-md-6">
                                <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" required autofocus>

                                @error('price')
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
