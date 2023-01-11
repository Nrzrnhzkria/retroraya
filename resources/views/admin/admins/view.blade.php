@extends('layouts.admin-panel')

@section('title')
    Admins
@endsection

@section('content')

<div class="container">
    
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-4 pb-2 mb-3 border-bottom">
        <h1 class="h2">Admins</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
              <a href="/create-user" class="btn btn-outline-dark"><i class="bi bi-person-plus"></i> Add Admin</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('addsuccess'))
    <div class="alert alert-info alert-block">
        <strong>{{ $message }}</strong>
    </div>
    @endif

    @if ($message = Session::get('updatesuccess'))
    <div class="alert alert-info alert-block">
        <strong>{{ $message }}</strong>
    </div>
    @endif

    @if ($message = Session::get('deleteuser'))
    <div class="alert alert-info alert-block">
        <strong>{{ $message }}</strong>
    </div>
    @endif
    
    <div class="row pb-3">
        
        @if(count($admins) > 0)
        <div class="table-responsive">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        {{-- <th scope="col">#</th> --}}
                        <th scope="col">Name</th>
                        <th scope="col">Role</th>
                        <th scope="col" class="text-center"><i class="bi bi-sliders"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($admins as $key => $admin)
                    <tr>
                        {{-- <th scope="row">{{ $admins->firstItem() + $key }}</th> --}}
                        <th>{{ $admin->name }}</th>
                        <td class="text-capitalize">{{ $admin->role }}</td>
                        <td class="text-center">
                            <a href="{{ url('update-admin') }}/{{ $admin->id }}" class="btn btn-dark"><i class="bi bi-chevron-right"></i></a>
                        </td>
                    </tr>                
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
            <p>There are no user to display.</p>
        @endif
        <div  class="self-align-end pt-3">{{ $admins->links() }}</div>

    </div>
    
</div>

@endsection