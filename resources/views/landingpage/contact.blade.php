@extends('layouts.app')

@section('title')
    Contact Us
@endsection

@section('content')

<div class="container">
    <div class="row px-2">
        <h1 class="text-center border-bottom pt-5">Contact</h1>
        
        <div class="col-md-5 pt-5 pb-3">
            
            <div class="card shadow p-4" style="background-color: orange">
                <h3>No 30-2, Jalan 9/23A, 
                <br>Off Jalan Usahawan, 
                <br>53200 Setapak, 
                <br>Kuala Lumpur.</h3>
                <br>
                <h5>Office : 03 - 4141 8311</h5>
                <h5>DPUKM Admin HUN : 011 - 1061 2950</h5>
                <h5>DPUKM DAH 2 Secretariat : 019 - 716 9628</h5>
                <h5>DPUKM Mohd Shahrin : 010 - 421 3816</h5>
                <br>
                <h5>Email : info.hun22@gmail.com</h5>
            </div>

        </div>
        
        <div class="col-md-7 pt-3">

            <div class="mapouter">
                <div class="gmap_canvas">
                    <iframe width="100%" height="500rem" id="gmap_canvas" src="https://maps.google.com/maps?q=no%2030-2,%20jalan%209/23A,%20off%20jalan%20usahawan,%2053200%20setapak&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                    <a href="https://fmovies-online.net"></a>
                    <br>
                    <style>
                        .mapouter{
                            position:relative;
                            text-align:left;
                        }
                    </style>
                    <a href="https://www.embedgooglemap.net"></a>
                    <style>
                        .gmap_canvas {
                            overflow:hidden;
                            background:none!important;
                        }
                    </style>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection