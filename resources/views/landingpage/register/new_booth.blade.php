@extends('layouts.app')

@section('title')
    Register
@endsection

@section('content')
<div class="container">
    <div class="row px-5">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-5 pb-2 mb-3 border-bottom">
            <h1>New Registration Form</h1>
        </div>
            <form action="{{ url('choose-booth/store') }}" method="POST">
                @csrf
    
                <div class="card px-4 py-4">
                    <ul class="nav nav-tabs px-2 py-2">
                        <li class="nav-item">
                          <a class="nav-link disabled">Step 1</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link active" aria-current="page">Step 2</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link disabled">Step 3</a>
                        </li>
                    </ul>

                    <div class="fw-bold px-2 py-2" style="background-color: orange">Choose Your Booth Type</div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="px-3">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="row p-3">

                            @if($details->nationality == 'local')
                                <div class="col-md-12 pb-2">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-sm">
                                            <thead class="bg-dark text-white">
                                                <tr>
                                                  <th scope="col">#</th>
                                                  <th scope="col">Hall Booth</th>
                                                  <th scope="col">Lot Placement</th>
                                                  <th scope="col">Price (RM)</th>
                                                  <th scope="col" class="text-center">Check</th>
                                                  <th scope="col" class="text-center">Remarks</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row">1</th>
                                                    <td>PREMIUM</td>
                                                    <td>Island</td>
                                                    <td>500,000</td>
                                                    <td class="text-center">
                                                        <input type="radio" name="amount" value="30000">
                                                    </td>
                                                    <td rowspan="5" class="text-danger w-25">Please note that this selected booth will have RM30,000 of deposit. You will be contacted by us to pay the balance.</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">2</th>
                                                    <td>36M x 24M</td>
                                                    <td>Island</td>
                                                    <td>250,000</td>
                                                    <td class="text-center">
                                                        <input type="radio" name="amount" value="30000">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">3</th>
                                                    <td>24M x 12M</td>
                                                    <td>Island</td>
                                                    <td>180,000</td>
                                                    <td class="text-center">
                                                        <input type="radio" name="amount" value="30000">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">4</th>
                                                    <td>24M x 24M</td>
                                                    <td>Island</td>
                                                    <td>100,000</td>
                                                    <td class="text-center">
                                                        <input type="radio" name="amount" value="30000">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">5</th>
                                                    <td>12M x 12M</td>
                                                    <td>Island</td>
                                                    <td>50,000</td>
                                                    <td class="text-center">
                                                        <input type="radio" name="amount" value="30000">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">6</th>
                                                    <td>6M x 12M</td>
                                                    <td>Island</td>
                                                    <td>25,000</td>
                                                    <td class="text-center">
                                                        <input type="radio" name="amount" value="25000">
                                                    </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">7</th>
                                                    <td>6M x 6M</td>
                                                    <td>Island</td>
                                                    <td>6,000</td>
                                                    <td class="text-center">
                                                        <input type="radio" name="amount" value="6000">
                                                    </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">8</th>
                                                    <td>6M x 3M</td>
                                                    <td>Terrace</td>
                                                    <td>5,000</td>
                                                    <td class="text-center">
                                                        <input type="radio" name="amount" value="5000">
                                                    </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">9</th>
                                                    <td>3M x 3M</td>
                                                    <td>Terrace</td>
                                                    <td>3,000</td>
                                                    <td class="text-center">
                                                        <input type="radio" name="amount" value="3000">
                                                    </td>
                                                    <td></td>
                                                </tr>
                                                <tr class="table-dark">
                                                    <th scope="row"></th>
                                                    <td>ENTREPRENEUR BOOTH</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">10</th>
                                                    <td>6M x 6M</td>
                                                    <td>Island</td>
                                                    <td>6,000</td>
                                                    <td class="text-center">
                                                        <input type="radio" name="amount" value="6000">
                                                    </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">11</th>
                                                    <td>3M x 3M</td>
                                                    <td>Terrace</td>
                                                    <td>3,000</td>
                                                    <td class="text-center">
                                                        <input type="radio" name="amount" value="3000">
                                                    </td>
                                                    <td></td>
                                                </tr>
                                                <tr class="table-dark">
                                                    <th scope="row"></th>
                                                    <td>FOOD COURT</td>
                                                    <td>RIVERSIDE</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">12</th>
                                                    <td>6M x 3M</td>
                                                    <td></td>
                                                    <td>1,500</td>
                                                    <td class="text-center">
                                                        <input type="radio" name="amount" value="6000">
                                                    </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">13</th>
                                                    <td>6M x 6M</td>
                                                    <td></td>
                                                    <td>3,000</td>
                                                    <td class="text-center">
                                                        <input type="radio" name="amount" value="3000">
                                                    </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">14</th>
                                                    <td>Food-Truck Space</td>
                                                    <td></td>
                                                    <td>1,000</td>
                                                    <td class="text-center">
                                                        <input type="radio" name="amount" value="1000">
                                                    </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">15</th>
                                                    <td>Car-Boot Park Spot</td>
                                                    <td></td>
                                                    <td>250 (5 days)</td>
                                                    <td class="text-center">
                                                        <input type="radio" name="amount" value="250">
                                                    </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">16</th>
                                                    <td>Food Ride</td>
                                                    <td></td>
                                                    <td>250 (5 days)</td>
                                                    <td class="text-center">
                                                        <input type="radio" name="amount" value="250">
                                                    </td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            @elseif($details->nationality == 'international')
                            <div class="col-md-12 pb-2">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-sm">
                                        <thead class="bg-dark text-white">
                                            <tr>
                                              <th scope="col">#</th>
                                              <th scope="col">Hall Booth</th>
                                              <th scope="col">Lot Placement</th>
                                              <th scope="col">Price (USD)</th>
                                              <th scope="col" class="text-center">Check</th>
                                              <th scope="col" class="text-center">Remarks</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>PREMIUM</td>
                                                <td>Island</td>
                                                <td>125,000</td>
                                                <td class="text-center">
                                                    <input type="radio" name="amount" value="7500">
                                                </td>
                                                <td rowspan="5" class="text-danger w-25">Please note that this selected booth will have USD7,500 of deposit. You will be contacted by us to pay the balance.</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>36M x 24M</td>
                                                <td>Island</td>
                                                <td>62,500</td>
                                                <td class="text-center">
                                                    <input type="radio" name="amount" value="7500">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td>24M x 12M</td>
                                                <td>Island</td>
                                                <td>45,000</td>
                                                <td class="text-center">
                                                    <input type="radio" name="amount" value="7500">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">4</th>
                                                <td>24M x 24M</td>
                                                <td>Island</td>
                                                <td>25,000</td>
                                                <td class="text-center">
                                                    <input type="radio" name="amount" value="7500">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">5</th>
                                                <td>12M x 12M</td>
                                                <td>Island</td>
                                                <td>12,500</td>
                                                <td class="text-center">
                                                    <input type="radio" name="amount" value="7500">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            @else
                                <p>Please select your nationality</p>
                            @endif
                            
                        </div>

                    <div class="col-md-12">
                        <div class="pull-right">
                            <button type="submit" class="btn btn-warning fw-bold">Next <i class="bi bi-chevron-double-right"></i></button>
                        </div>
                    </div>
                </div>
            </form>
    </div>
</div>
@endsection