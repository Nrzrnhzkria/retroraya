@extends('layouts.app')

@section('title')
    Hari Usahawan Negara
@endsection

@section('content')

{{-- Style for countdown --}}
<style>
    .timer {
        margin: 0 0 45px;
        color: white;
        display: inline-block;
        font-weight: 100;
        text-align: center;
        font-size: 60px;
    }
    .timer div {
        padding: 30px;
        border-radius: 3px;
        background: orangered;
        display: inline-block;
        font-size: 40px;
        font-weight: 400;
        width: 110px;
        margin-bottom: 10px;
    }
    .timer .smalltext {
        color: lightgrey;
        font-size: 12px;
        font-weight: 500;
        display: block;
        padding: 0;
        width: auto;
    }
    .timer #time-up {
        margin: 8px 0 0;
        text-align: left;
        font-size: 14px;
        font-style: normal;
        color: #000000;
        font-weight: 500;
        letter-spacing: 1px;
    }
</style>

<div class="row-fluid">
    <div class="col-md-12 text-center py-4" style="background-image: url('{{ asset('assets/img/header.jpg') }}'); width:100%; height:38%;">
    {{-- <div class="col-md-12  pb-2" style="background-color: rgba(255, 166, 0, 0.678); width:100%; height:38%;"> --}}
        
        <div class="container p-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="timer">
                        <div class="shadow py-2">
                            <span class="days" id="day"></span> 
                            <div class="smalltext">Days</div>
                        </div>
                        <div class="shadow py-2">
                            <span class="hours" id="hour"></span> 
                            <div class="smalltext">Hours</div>
                        </div>
                        <div class="shadow py-2">
                            <span class="minutes" id="minute"></span> 
                            <div class="smalltext">Minutes</div>
                        </div>
                        <div class="shadow py-2">
                            <span class="seconds" id="second"></span> 
                            <div class="smalltext">Seconds</div>
                        </div>
                        <p id="time-up"></p>
                    </div>
                    <h1 class="fw-bold text-white">To go for HARI USAHAWAN NEGARA launching</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container py-4">

    <div class="row pb-4">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                {{-- @for($i=$count; $i<=$totalbanners; $i++)
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $i }}" aria-label="Slide {{ ++$count }}"></button>
                @endfor --}}
                @foreach ($banners as $banner)
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}" aria-label="Slide {{ $count++ }}"></button>
                @endforeach
                {{-- <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button> --}}
            </div>
            <div class="carousel-inner">
                @foreach ($banners as $key => $banner)
                    <div class="carousel-item{{ $key == 0 ? ' active' : '' }}">
                        <img src="{{ $banner->img_name }}" class="d-block w-100" alt="banner">
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <div class="row py-4">        
        <div class="table-responsive">
        <table class="table table-borderless">
            <tbody>
                <tr>
                @foreach ($news->take(3) as $new)
                    <td>
                        <div class="col-md-3">
                            {{-- <a href="/news" class="text-dark text-decoration-none"> --}}
                            <div class="card shadow" style="width: 22rem;">
                                <img src="{{ $new->img_name }}" class="card-img-top" alt="...">
                                <div class="card-body">
                                <h5 class="card-title">{{ $new->title }}</h5>
                                {{-- <p class="card-text">{{ $new->teaser}}</p> --}}
                                <div class="text-end">
                                    <a href="{{ url('news') }}/{{ $new->id }}" class="btn btn-warning btn-sm fw-bold">See More >></a>
                                </div>
                                </div>
                            </div>
                            {{-- </a> --}}
                        </div> 
                    </td>        
                @endforeach
                </tr>
            </tbody>
        </table>       
        </div>
    </div>

    <div class="row py-4">
        <div class="col-md-4 pb-2">
            {{-- <a href="http://" class="btn btn-warning text-start p-4">  --}}
                <div class="card shadow text-white border-0 bg-success" style="height: 29rem">
                    <h4 class="card-header text-center py-3">ABOUT HUN MEMBERSHIP</h4>
                    <div class="card-body p-4">
                        <p class="card-text">The benefits when you be the HUN members :</p>
                        <ul>
                            <li>HUN members get attend to the seminar/workshop/programs with numerous information about marketing, licensing and franchising by top notch entrepreneur.</li>
                            <li>HUN members will be able to stand a chance to win amazing prizes by participating in lucky draw.</li>
                        </ul>
                    </div>
                </div>
            {{-- </a> --}}
        </div>
        <div class="col-md-4 pb-2">
            <div class="card shadow border-0 bg-warning" style="height: 29rem">
                <h4 class="card-header text-center py-3">BECOME A VENDOR</h4>
                <div class="card-body p-4">
                    <p class="card-text">Learn how to get started as vendor and finding business opportunities with HUN.</p>
                    <ul class="card-text">
                        <li>Valuable exposure in creating trustful and legitimate business of your brands.</li>
                        <li>Build Community Networking and meet thousands of local consumers who are interested in local brand.</li>
                        <li>Business is professionally managed to take local sources to the globalization market.</li>
                    </ul>

                    <div class="col-auto text-center pt-2">
                        <a href="/booth-information" class="btn btn-outline-dark shadow fw-bold"><i class="bi bi-info-circle-fill"></i> Booth Information</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 pb-2">
            <div class="card shadow text-white border-0 bg-danger" style="height: 29rem">
                <h4 class="card-header text-center py-3">THE EXHIBITIONS</h4>
                <div class="card-body p-4">
                    <p class="card-text">
                        There are 8 upcoming exhibition, booth, programs, mentoring and etc can help growth your business and acquire information about new industry developments.
                    </p>
                    <p class="card-text">
                        The exhibition aims to host more than 2000 booths from local and international products.
                    </p>
                    <p class="card-text">
                        The exhibitions which businesses and companies in a specific niche come together to showcase their brands and products or promote new business developments.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="row pt-4">
        <div class="col-md-6 text-center">
            <img class="img-fluid" src="{{ asset('assets/img/phone.png') }}" width="350rem">
        </div>
        <div class="col-md-6 text-center pt-5">
            <h3>DOWNLOAD HUN22 OFFICIAL <br> MOBILE APP</h3>
            <p>Available in Apple App Store and Google Playstore</p>
            <a href="https://apps.apple.com/my/app/hari-usahawan-negara-hun/id1608371924"><img class="img-fluid" src="{{ asset('assets/img/appstore.png') }}" width="23.5%"></a>
            <a href="https://play.google.com/store/apps/details?id=my.hariusahawannegara.com"><img class="img-fluid" src="{{ asset('assets/img/playstore.png') }}" width="28%"></a>
        </div>
    </div>

    {{-- <div class="row">
        <div class="brand-carousel owl-carousel">
            <img src="https://i.postimg.cc/QxPJ8hXy/brand-1.png">
            <img src="https://i.postimg.cc/pdMQjC5Q/brand-2.png">
            <img src="https://i.postimg.cc/B6qxYvgX/brand-3.png">
            <img src="https://i.postimg.cc/d14GzKHn/brand-4.png">
            <img src="https://i.postimg.cc/x8ZM13Sz/brand-5.png">
            <img src="https://i.postimg.cc/B6qxYvgX/brand-3.png">
        </div>
    </div> --}}
    
</div>

{{-- @if (Route::has('login'))
    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
        @auth
            <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
        @else
            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
            @endif
        @endauth
    </div>
@endif --}}

{{-- Countdown --}}
<script>
    var deadline = new Date("mar 24, 2022 00:00:00").getTime();             
    var x = setInterval(function() {
    var currentTime = new Date().getTime();                
    var t = deadline - currentTime; 
    var days = Math.floor(t / (1000 * 60 * 60 * 24)); 
    var hours = Math.floor((t%(1000 * 60 * 60 * 24))/(1000 * 60 * 60)); 
    var minutes = Math.floor((t % (1000 * 60 * 60)) / (1000 * 60)); 
    var seconds = Math.floor((t % (1000 * 60)) / 1000); 
    document.getElementById("day").innerHTML = days ; 
    document.getElementById("hour").innerHTML = hours; 
    document.getElementById("minute").innerHTML = minutes; 
    document.getElementById("second").innerHTML = seconds; 
    if (t < 0) {
        clearInterval(x); 
        document.getElementById("time-up").innerHTML = "TIME UP"; 
        document.getElementById("day").innerHTML ='0'; 
        document.getElementById("hour").innerHTML ='0'; 
        document.getElementById("minute").innerHTML ='0' ; 
        document.getElementById("second").innerHTML = '0'; 
    } 
    }, 1000);  
</script>

{{-- Slick Slider --}}
<script type="text/javascript">
    $('.brand-carousel').owlCarousel({
        loop:true,
        autoplay:true,
        responsive:{
            0:{
            items:3
            },
            600:{
            items:4
            },
            1000:{
            items:5
            }
        }
    }) 

</script>
@endsection