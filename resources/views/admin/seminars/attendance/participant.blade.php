@extends('layouts.admin-panel')

@section('title')
    Seminar
@endsection

@section('content')

<div class="container">
    
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-4 pb-2 mb-3 border-bottom">
        <h1 class="h2">Participant</h1>
    </div>
    
    <div class="row">
        
        <div class="col-md-9">
            <div class="float-right pt-3">{{ $attendance->links() }}</div>
            @if(count($attendance) > 0)
            <div class="table-responsive">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone No</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($participants as $participant)
                        @foreach ($attendance as $attendances)
                        @if ($attendances->user_id == $participant->id)
                            <tr>
                                <th scope="row">{{ $count++ }}</th>
                                <td>{{ $participant->name }}</td>
                                <td>{{ $participant->email }}</td>
                                <td>{{ $participant->phone_no }}</td>
                            </tr>  
                        @endif                           
                        @endforeach                      
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
              <p>There are no participant to display.</p>
            @endif
        </div>

        <div class="col-md-3">
            <div class="row-fluid pb-2">
                <div class="card border-0 shadow text-center" style="height: 125px">
                  <h6 class="pt-4">Total Participant</h6>
                  <b class="display-6 pb-3">{{ number_format($totalattendance) }}</b>
                </div>
            </div>
        </div>
    </div>
    
</div>

@endsection