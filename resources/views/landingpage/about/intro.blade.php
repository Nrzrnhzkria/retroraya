@extends('layouts.app')

@section('title')
    About Us
@endsection

@section('content')

<div class="container py-4">
    <div class="row px-2">
        <div class="card px-4 py-4" style="background-image: url('{{ asset('assets/img/about/introbg.png') }}');">
            <div class="row pb-4">
                <div class="col-md-12 text-center">        
                    <img class="img-fluid" src="{{ asset('assets/img/about/dpukm.png') }}" alt="" style="width: 20rem">
                </div>
            </div>

            <div class="text-center fw-bold px-2 py-2" style="background-color: orange">INTRODUCTION</div>

            <div class="row fw-bold p-4">
                <p style="text-align: justify;">&nbsp;&nbsp;&nbsp;&nbsp;DEWAN PERNIAGAAN USAHAWAN KECIL MALAYSIA,
                    abbreviated  (DPUKM) was formed on Mac 2013 is a platform for entrepreneurs that handle by 100% Bumiputera 
                    in collaboration with Ministries, Departments, Agencies, Cooperatives and the Private Sector. 
                
                    Dato 'Seri Abu Hasan Bin Mohd Nor as the 
                    founder and President and fully assisted by Datin Sri Norliah Che Mohamad as the Secretary General and several 
                    Members of the Supreme Council (SC) in the management of the association. 
                </p> 
                <p style="text-align: justify;">&nbsp;&nbsp;&nbsp;&nbsp;With the existing capabilities and experience, 
                    DPUKM capable to be a main platform and intended for helping small and medium-sized industry entrepreneurs move 
                    in line with the relevant Ministries and Agencies to succeed in the field of business ventured and launching a business.
                </p>
            </div>
        </div>
    </div>
</div>

@endsection