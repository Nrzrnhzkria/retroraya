@extends('layouts.admin-panel')

@section('title')
    Vendors
@endsection

@section('content')

<div class="container">
    
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-4 pb-2 mb-3 border-bottom">
        <h1 class="h2">Vendors</h1>
    </div>

    @if ($message = Session::get('updatevendor'))
    <div class="alert alert-info alert-block">
        <strong>{{ $message }}</strong>
    </div>
    @endif

    @if ($message = Session::get('deletevendor'))
    <div class="alert alert-info alert-block">
        <strong>{{ $message }}</strong>
    </div>
    @endif
    
    <div class="row">
        
        <div class="col-md-12">
            @if(count($payments) > 0)
            <div class="table-responsive">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            {{-- <th scope="col">#</th> --}}
                            <th scope="col">Vendor</th>
                            <th scope="col">Booth</th>
                            <th scope="col" class="text-center">Payment Status</th>
                            <th scope="col" class="text-center"><i class="bi bi-sliders"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vendors as $vendor)
                        @foreach ($booth_types as $booth_type)
                        @foreach ($payments as $payment)
                        @if ($payment->details_id == $booth_type->details_id)
                        @if ($payment->payer_id == $vendor->user_id)
                        <tr>
                            {{-- <th scope="row">{{ $count++ }}</th> --}}
                            <th>{{ $vendor->company_name }}</th>
                            <td>{{ $booth_type->booth_type }}</td>
                            <td class="text-center">
                                @if ( $payment->status == 'success')
                                    <span class="badge rounded-pill bg-success">Success</span>
                                @else
                                    <span class="badge rounded-pill bg-danger">Failed</span>
                                @endif
                                
                            </td>
                            <td class="text-center">
                                <a href="{{ url('update-vendor') }}/{{ $vendor->user_id }}" class="btn btn-dark"><i class="bi bi-chevron-right"></i></a>
                            </td>
                        </tr>        
                        @endif        
                        @endif                           
                        @endforeach                       
                        @endforeach                     
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
              <p>There are no vendor to display.</p>
            @endif
            <div class="float-right pt-3">{{ $payments->links() }}</div>
        </div>
    </div>
    
</div>

@endsection