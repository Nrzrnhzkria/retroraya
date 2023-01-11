@extends('layouts.app')

@section('title')
    Register
@endsection

@section('content')
<div class="container">
    <div class="row px-5">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-5 pb-2 mb-3 border-bottom">
            <h1>Update Registration Form</h1>
        </div>

        @if ($message = Session::get('update'))
        <div class="alert alert-info alert-block">
            <strong>{{ $message }}</strong>
        </div>
        @endif

        <form action="{{ url('exist-registration/store') }}/{{ $vendor->id }}" method="POST" enctype="multipart/form-data">
        @csrf
    
            <div class="card px-4 py-4">
                {{-- <ul class="nav nav-tabs px-2 py-2">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Step 1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled">Step 2</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled">Step 3</a>
                    </li>
                </ul> --}}

                <div class="fw-bold px-2 py-2" style="background-color: orange">Exhibitor Information / <em style="font-size: 10pt;">Maklumat Pempamer</em></div>
    
                <div class="row p-3">

                    <div class="col-md-6 pb-2">
                        <label>Name of Company / <em style="font-size: 10pt;">Nama Syarikat</em></label>
                        <input type="text" value="{{ $details->company_name }}" class="form-control form-control-sm" placeholder="Company Sdn Bhd"  name="company_name" readonly>
                    </div>

                    <div class="col-md-6 pb-2">
                        <label>Contact Person / <em style="font-size: 10pt;">Nama Penuh</em></label>
                        <input type="text" value="{{ $vendor->name  }}" class="form-control form-control-sm" placeholder="Mohammad"  name="name" readonly>
                    </div>
                    <div class="col-md-6 pb-2">
                        <label>Designation / <em style="font-size: 10pt;">Jawatan</em></label>
                        <input type="text" value="{{ $details->designation }}" class="form-control form-control-sm" name="designation" readonly/>
                        {{-- <select class="form-select form-select-sm" aria-label="Default select example" name="designation" value="{{ $details->designation }}">                                 
                            <option disabled selected>-- Please Select --</option>
                            <option value="CEO">CEO</option>
                            <option value="Proprietor">Proprietor</option>
                            <option value="Owner">Owner</option>
                            <option value="Founder">Founder</option>
                            <option value="Team Leader">Team Leader</option>
                            <option value="Manager">Manager</option>
                            <option value="Assistant Manager">Assistant Manager</option>
                            <option value="Executive">Executive</option>
                            <option value="Director">Director</option>
                            <option value="Coordinator">Coordinator</option>
                            <option value="Administrator">Administrator</option>
                            <option value="Organizer">Organizer</option>
                            <option value="Administrator">Managing Partner</option>
                            <option value="Others">Others</option>
                        </select> --}}
                    </div>

                    <div class="col-md-6 pb-2">
                        <label>IC/Passport No. / <em style="font-size: 10pt;">No. Kad Pengenalan/Pasport</em></label>
                        <input type="text" value="{{ $vendor->ic_no }}" class="form-control form-control-sm" name="ic_no" readonly/>
                    </div>

                    <div class="col-md-6 pb-2">
                        <label>Phone No. / <em style="font-size: 10pt;">No. Telefon</em></label>
                        <input type="text" value="{{ $vendor->phone_no }}" class="form-control form-control-sm" name="phone_no" readonly/>
                    </div>

                    <div class="col-md-6 pb-2">
                        <label>Email / <em style="font-size: 10pt;">Emel</em></label>
                        <input type="email" value="{{ $vendor->email }}" class="form-control form-control-sm" name="email" placeholder="example@gmail.com" readonly/>
                    </div>

                    <div class="col-md-12 pb-2">
                        <label>Company Address / <em style="font-size: 10pt;">Alamat Syarikat</em></label>
                        <textarea type="text" class="form-control form-control-sm" placeholder="Ali"  name="company_address" readonly>{{ $details->company_address }}</textarea>
                    </div>

                    <div class="col-md-6 pb-2">
                        <label>Nationality / <em style="font-size: 10pt;">Kewarganegaraan</em></label>
                        <input type="text" value="{{ $details->nationality }}" class="form-control form-control-sm" name="nationality" readonly/>
                        {{-- <select class="form-select form-select-sm" aria-label="Default select example" name="nationality" value="{{ $details->nationality }}">                                 
                            <option disabled selected>-- Please Select --</option>
                            <option value="local">Citizens</option>
                            <option value="international">Non-citizens</option>
                        </select> --}}
                    </div>

                    <div class="col-md-6 pb-4">
                        <label>Nature of Business / <em style="font-size: 10pt;">Jenis Perniagaan</em></label>
                        <input type="text" value="{{ $details->business_nature }}" class="form-control form-control-sm" name="business_nature" readonly/>
                        {{-- <select class="form-select form-select-sm" aria-label="Default select example" name="business_nature" value="{{ $details->business_nature }}">                                 
                            <option disabled selected>-- Please Select --</option>
                            <option value="Sole proprietorship">Sole proprietorship</option>
                            <option value="Partnership">Partnership</option>
                            <option value="Private limited company">Private limited company</option>
                            <option value="Public limited company">Public limited company</option>
                            <option value="Unlimited companies">Unlimited companies</option>
                            <option value="Foreign company">Foreign company</option>
                            <option value="Limited liability partnership">Limited liability partnership</option>
                        </select> --}}
                    </div>

                    <div class="col-md-12 py-2">                     
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <th>#</th>
                                    <th>Document</th>
                                    <th class="text-center"><i class="bi bi-sliders"></i></th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Product Details</td>
                                        <td class="text-center"><a href="{{ $details->product_details }}" class="btn btn-outline-warning btn-sm"><i class="bi bi-eye-fill"></i> View</a></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>SSM Certificate</td>
                                        <td class="text-center"><a href="{{ $details->ssm_cert }}" class="btn btn-outline-warning btn-sm"><i class="bi bi-eye-fill"></i> View</a></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Vaccine Certificate</td>
                                        <td class="text-center"><a href="{{ $details->vaccine_cert }}" class="btn btn-outline-warning btn-sm"><i class="bi bi-eye-fill"></i> View</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                
                </div>

                <div class="fw-bold px-2 py-2" style="background-color: orange">Payment Details / <em style="font-size: 10pt;">Maklumat Pembayaran</em></div>
                
                <div class="row p-3">
                    <div class="col-md-6 pb-2">
                        <label>Amount / <em style="font-size: 10pt;">Jumlah</em></label>
                        <input type="text" value="RM {{ $payment->amount }}" class="form-control form-control-sm" name="amount" readonly/>
                    </div>

                    <div class="col-md-6 pb-2">
                        <label>Bill ID / <em style="font-size: 10pt;">ID Bil</em></label>
                        <input type="text" value="{{ $payment->senangpay_id }}" class="form-control form-control-sm" name="senangpay_id" readonly/>
                    </div>    

                    <div class="col-md-6 pb-2">
                        <label>Booth Name / <em style="font-size: 10pt;">Nama Gerai</em></label>
                        <input type="text" value="{{ $booth_name->booth_name }}" class="form-control form-control-sm" name="booth_name" readonly/>
                    </div>   
                    
                    <div class="col-md-6 pb-2">
                        <label>Booth Type / <em style="font-size: 10pt;">Jenis Gerai</em></label>
                        <input type="text" value="{{ $booth_type->booth_type }}" class="form-control form-control-sm" name="booth_type" readonly/>
                    </div>  
                </div>

                <div class="fw-bold px-2 py-2" style="background-color: orange">Coupon Details / <em style="font-size: 10pt;">Maklumat Kupon</em></div>

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

                    <div class="col-md-6 pb-2">
                        <label for="formFile" class="form-label">Coupon Category / <em style="font-size: 10pt;">Kategori Kupon</em></label>
                        {{-- <input class="form-control form-control-sm" type="text" name="category" value="{{ $coupon->category }}"/>   --}}
                        <select class="form-select form-select-sm" aria-label="Default select example" name="category">                                 
                            <option disabled selected>-- Please Select --</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>  
                            @endforeach
                        </select>    
                    </div>

                    <div class="col-md-6 pb-2">
                        <label for="formFileMultiple" class="form-label">Coupon / <em style="font-size: 10pt;">Kupon</em></label>
                        <input class="form-control form-control-sm" type="file" name="img_name[]" id="formFile" multiple>
                        <em style="font-size: 10pt;">File format: png, jpeg (Each image size must below 1MB)</em><br>
                        <em style="font-size: 10pt;">*Please provide 200x400 pixel sizes of coupon</em><br>
                        <em style="font-size: 10pt;">*Every coupon are require to put company name or items name or brand on it</em>
                        <em style="font-size: 10pt;">Click <a href="https://hariusahawannegara.com.my/assets/img/coupon.jpeg">here</a> to see example</em>
                    </div>

                    <h4 class="py-3">Uploaded Coupon / <em style="font-size: 10pt;">Kupon yang Dimuat Naik</em></h4>

                    @if(count($coupon) > 0)
                    @foreach ($coupon as $coupons)
                        @if ($vendor->id == $coupons->vendor_id)
                        <div class="col-md-4">
                            <div class="card mb-3">
                                <a href="{{ $coupons->img_name }}" class="text-dark text-decoration-none">
                                    <div class="row g-0">
                                            <div class="col-md-4">
                                                <img src="{{ $coupons->img_name }}" class="img-fluid rounded-start" alt="...">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body py-0">
                                                <p class="fw-bold pt-2">{{ $coupons->category }}</p>
                                                </div>
                                            </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endif
                    @endforeach
                    @else
                      <p>There are no coupon to display. You can upload the coupon at <em>Choose Files</em> above.</p>
                      <p><em style="font-size: 10pt;">Tiada kupon untuk dipaparkan. Anda boleh muat naik kupon di ruangan yang telah disediakan di atas.</em></p>
                    @endif
                    
                </div>

                <div class="col-md-12">
                    <div class="pull-right">
                        <button type="submit" class="btn btn-warning fw-bold"><i class="bi bi-save2"></i> Save</button>
                    </div>
                </div>
                
            </div>
        </form>
    </div>
</div>
@endsection