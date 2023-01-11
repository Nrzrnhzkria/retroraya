@extends('layouts.admin-panel')

@section('title')
    Booth
@endsection

@section('content')

<div class="container">
    
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-4 pb-2 mb-3 border-bottom">
        <h1 class="h2">Booth Details</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ url('create-booth-details') }}/{{ $booth->booth_id }}" class="btn btn-outline-dark"><i class="bi bi-plus-lg"></i> Add Details</a>
        </div>
    </div>

    @if ($message = Session::get('addbooth'))
    <div class="alert alert-info alert-block">
        <strong>{{ $message }}</strong>
    </div>
    @endif

    @if ($message = Session::get('updatebooth'))
    <div class="alert alert-info alert-block">
        <strong>{{ $message }}</strong>
    </div>
    @endif

    @if ($message = Session::get('deletebooth'))
    <div class="alert alert-info alert-block">
        <strong>{{ $message }}</strong>
    </div>
    @endif
    
    @if ($message = Session::get('addboothdetails'))
    <div class="alert alert-info alert-block">
        <strong>{{ $message }}</strong>
    </div>
    @endif

    @if ($message = Session::get('updateboothdetails'))
    <div class="alert alert-info alert-block">
        <strong>{{ $message }}</strong>
    </div>
    @endif

    @if ($message = Session::get('deleteboothdetails'))
    <div class="alert alert-info alert-block">
        <strong>{{ $message }}</strong>
    </div>
    @endif

    <div class="row">
        
        <div class="col-md-12">
            <div class="float-right pt-3">{{ $booth_details->links() }}</div>
            @if(count($booth_details) > 0)
            <div class="table-responsive">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            {{-- <th scope="col">#</th> --}}
                            <th scope="col">Booth Type</th>
                            <th scope="col">Price (RM)</th>
                            <th scope="col" class="text-center"><i class="bi bi-sliders"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($booth_details as $key => $booth_detail)
                        <tr>
                            {{-- <th scope="row">{{ $booth_details->firstItem() + $key }}</th> --}}
                            <th>{{ $booth_detail->booth_type }}</th>
                            <td>{{ number_format($booth_detail->price) }}</td>
                            <td class="text-center">
                                <a href="{{ url('update-booth-details') }}/{{ $booth_detail->booth_id }}/{{ $booth_detail->details_id }}" class="btn btn-dark"><i class="bi bi-chevron-right"></i></a>
                            </td>
                        </tr>                
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
              <p>There are no details to display.</p>
            @endif
        </div>
    </div>
    
</div>

@endsection