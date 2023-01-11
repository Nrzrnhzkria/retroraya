@extends('layouts.admin-panel')

@section('title')
    Seminar
@endsection

@section('content')

<div class="container">
    
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-4 pb-2 mb-3 border-bottom">
        <h1 class="h2">Seminar QR</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
              <a href="/create-qr" class="btn btn-outline-dark"><i class="bi bi-plus-lg"></i> Add Seminar</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('addqr'))
    <div class="alert alert-info alert-block">
        <strong>{{ $message }}</strong>
    </div>
    @endif

    @if ($message = Session::get('updateqr'))
    <div class="alert alert-info alert-block">
        <strong>{{ $message }}</strong>
    </div>
    @endif

    @if ($message = Session::get('deleteqr'))
    <div class="alert alert-info alert-block">
        <strong>{{ $message }}</strong>
    </div>
    @endif
    
    <div class="row">
        
        <div class="col-md-12">
            <div class="float-right pt-3">{{ $seminarsqr->links() }}</div>
            @if(count($seminarsqr) > 0)
            <div class="table-responsive">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            {{-- <th scope="col">#</th> --}}
                            <th scope="col">Seminar Name</th>
                            <th scope="col">Location</th>
                            <th scope="col">Date</th>
                            <th scope="col">QR Code</th>
                            <th scope="col" class="text-center"><i class="bi bi-sliders"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($seminarsqr as $key => $seminarqr)
                        <tr>
                            {{-- <th scope="row">{{ $seminarsqr->firstItem() + $key }}</th> --}}
                            <th>{{ $seminarqr->seminar_name }}</th>
                            <td>{{ $seminarqr->location_name }}</td>
                            <td>{{ date('d/m/Y', strtotime($seminarqr->seminar_date)) }}</td>
                            <td>
                                {{-- {{ route('qrcode.download', [ 'type' => 'png' ])}} <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->errorCorrection('H')->size(50)->generate('codingdriver.com')) !!}" /> --}}
                                <form class="form-horizontal" action="{{ url('download-qr/png') }}/{{ $seminarqr->id }}" method="post">
                                    @csrf
                                    <button type="submit" class="align-middle btn btn-outline-dark">
                                        <i class="bi bi-download"></i> Download PNG
                                    </button>
                                </form>
                            </td>
                            <td class="text-center">
                                <a href="{{ url('update-qr') }}/{{ $seminarqr->id }}" class="btn btn-dark"><i class="bi bi-chevron-right"></i></a>
                            </td>
                        </tr>                
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
              <p>There are no seminar to display.</p>
            @endif
        </div>
    </div>
    
</div>

@endsection