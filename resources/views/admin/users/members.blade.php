@extends('layouts.admin-panel')

@section('title')
    Apps User
@endsection

@section('content')

<div class="container">
    
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-4 pb-2 mb-3 border-bottom">
        <h1 class="h2">Members</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group">  
                <a class="btn btn-outline-dark" href="{{ url('export-members') }}">
                    <i class="bi bi-download pr-2"></i> Export
                </a>
            </div>
        </div>
    </div>
    
    <div class="row pb-3">    
        
        <div class="col-md-12">
            @if(count($members) > 0)
            <div class="table-responsive">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            {{-- <th scope="col">#</th> --}}
                            <th scope="col">HUN ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col" class="text-center"><i class="bi bi-sliders"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($members as $key => $member)
                        <tr>
                            {{-- <th scope="row">{{ $members->firstItem() + $key }}</th> --}}
                            <th>{{ $member->hun_id }}</th>
                            <td>{{ $member->name }}</td>
                            <td>{{ $member->email }}</td>
                            <td class="text-center">
                                <a href="{{ url('update-user') }}/{{ $member->id }}" class="btn btn-dark"><i class="bi bi-chevron-right"></i></a>
                            </td>
                        </tr>                
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
              <p>There are no member to display.</p>
            @endif
            <div  class="self-align-end pt-3">{{ $members->links() }}</div>
        </div>

    </div>
    
</div>

@endsection