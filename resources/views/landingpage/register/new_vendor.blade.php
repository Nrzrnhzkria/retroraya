@extends('layouts.app')

@section('title')
    Register
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-5 pb-2 mb-3 border-bottom">
            <h1>New Registration Form</h1>
        </div>

        <form action="{{ url('new-registration/store') }}/{{ $vendor_ic }}" method="POST" enctype="multipart/form-data">
        @csrf
    
            <div class="card px-4 py-4">

                <div class="fw-bold px-2 py-2" style="background-color: orange">Exhibitor Information / <em style="font-size: 10pt;">Maklumat Pempamer</em></div>
    
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

                    <input type="hidden" value="Vendor" class="form-control" name="role" readonly/>

                    <div class="col-md-12 pb-2">
                        <label>Name of Company / <em style="font-size: 10pt;">Nama Syarikat</em><span class="text-danger">*</span></label>
                        <input type="text" value="{{ $details->company_name ?? '' }}" class="form-control form-control-sm" placeholder="Company Sdn Bhd"  name="company_name">
                    </div>

                    <div class="col-md-6 pb-2">
                        <label>Full Name / <em style="font-size: 10pt;">Nama Penuh</em><span class="text-danger">*</span></label>
                        <input type="text" value="{{ $vendor->name ?? '' }}" class="form-control form-control-sm" placeholder="Mohammad"  name="name">
                    </div>
                    <div class="col-md-6 pb-2">
                        <label>Designation / <em style="font-size: 10pt;">Jawatan</em><span class="text-danger">*</span></label>
                        <select class="form-select form-select-sm" aria-label="Default select example" name="designation" value="{{ $details->designation ?? '' }}">                                 
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
                        </select>
                    </div>

                    <div class="col-md-6 pb-2">
                        <label>IC/Passport No. / <em style="font-size: 10pt;">No. Kad Pengenalan/Pasport</em><span class="text-danger">*</span></label>
                        <input type="text" value="{{ $vendor_ic ?? '' }}" class="form-control form-control-sm" name="ic_no" readonly/>
                    </div>

                    <div class="col-md-6 pb-2">
                        <label>Nationality / <em style="font-size: 10pt;">Kewarganegaraan</em><span class="text-danger">*</span></label>
                        <select class="form-select form-select-sm" aria-label="Default select example" name="nationality" value="{{ $details->nationality ?? '' }}">                                 
                            <option disabled selected>-- Please Select --</option>
                            <option value="Local">Citizens</option>
                            <option value="International">Non-citizens</option>
                        </select>
                    </div>

                    <div class="col-md-12 pb-2">
                        <label>Company Address / <em style="font-size: 10pt;">Alamat Syarikat</em><span class="text-danger">*</span></label>
                        <textarea type="text" value="{{ $details->company_address ?? '' }}" class="form-control form-control-sm" placeholder="Ali"  name="company_address"></textarea>
                    </div>

                    <div class="col-md-6 pb-2">
                        <label>Email / <em style="font-size: 10pt;">Emel</em><span class="text-danger">*</span></label>
                        <input type="email"  value="{{ $vendor->email ?? '' }}" class="form-control form-control-sm" name="email" placeholder="example@gmail.com"/>
                        <input type="hidden"  value="{{ $vendor_ic ?? '' }}" class="form-control form-control-sm" name="password"/>
                    </div>

                    <div class="col-md-6 pb-2">
                        <label>Nature of Business / <em style="font-size: 10pt;">Jenis Perniagaan</em><span class="text-danger">*</span></label>
                        <select class="form-select form-select-sm" aria-label="Default select example" name="business_nature" value="{{ $details->business_nature ?? '' }}">                                 
                            <option disabled selected>-- Please Select --</option>
                            <option value="Sole proprietorship">Sole proprietorship</option>
                            <option value="Partnership">Partnership</option>
                            <option value="Private limited company">Private limited company</option>
                            <option value="Public limited company">Public limited company</option>
                            <option value="Unlimited companies">Unlimited companies</option>
                            <option value="Foreign company">Foreign company</option>
                            <option value="Limited liability partnership">Limited liability partnership</option>
                        </select>
                    </div>

                    <div class="col-md-6 pb-2">
                        <label for="phoneno" class="form-label">Phone No. / <em style="font-size: 10pt;">No. Telefon</em><span class="text-danger">*</span></label>
                        <input type="text" value="+60{{ $vendor->phone_no ?? '' }}" class="form-control form-control-sm" name="phone_no" required/>
                        <em style="font-size: 10pt;">Please include the country code. E.g. +60</em>
                    </div>

                    <div class="col-md-6 pb-2">
                        <label for="formFile" class="form-label">Details of Displayed Product / <em style="font-size: 10pt;">Butiran Produk yang Dipaparkan</em><span class="text-danger">*</span></label>
                        <input class="form-control form-control-sm" type="file" name="product_details" value="{{ $details->product_details ?? '' }}" id="formFile">
                        <em style="font-size: 10pt;">File format: docx, csv, pdf, png, jpeg (File size must below 1MB)</em>
                    </div>

                    <div class="col-md-6 pb-2">
                        <label for="formFile" class="form-label">SSM Certificate / <em style="font-size: 10pt;">Sijil SSM</em><span class="text-danger">*</span></label>
                        <input class="form-control form-control-sm" type="file" name="ssm_cert" value="{{ $details->ssm_cert ?? '' }}" id="formFile">
                        <em style="font-size: 10pt;">File format: docx, csv, pdf, png, jpeg (File size must below 1MB)</em><br>
                        <em style="font-size: 10pt;">Click <a href="https://hariusahawannegara.com.my/assets/img/ssm.jpg">here</a> to see example</em>
                    </div>

                    <div class="col-md-6 pb-2">
                        <label for="formFile" class="form-label">Vaccine Certificate / <em style="font-size: 10pt;">Sijil Vaksin</em><span class="text-danger">*</span></label>
                        <input class="form-control form-control-sm" type="file" name="vaccine_cert" value="{{ $details->vaccine_cert ?? '' }}" id="formFile">
                        <em style="font-size: 10pt;">File format: docx, csv, pdf, png, jpeg (File size must below 1MB)</em><br>
                        <em style="font-size: 10pt;">Click <a href="https://hariusahawannegara.com.my/assets/img/vaccine.jpg">here</a> to see example</em>
                    </div>
                    
                </div>

                <div class="fw-bold px-2 py-2" style="background-color: orange">Coupon Details (Optional) / <em style="font-size: 10pt;">Maklumat Kupon</em></div>
                
                <div class="row p-3">                  
                    <div class="col-md-6 pb-2">
                        <label for="formFile" class="form-label">Coupon Category / <em style="font-size: 10pt;">Kategori Kupon</em></label>
                        <select class="form-select form-select-sm" aria-label="Default select example" name="category">                                 
                            <option disabled selected>-- Please Select --</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>  
                            @endforeach
                        </select>                         
                    </div>

                    <div class="col-md-6 pb-2">
                        
                        {{-- <div id="inputFormRow"> --}}
                            <label for="formFileMultiple" class="form-label">Coupon / <em style="font-size: 10pt;">Kupon</em></label>
                            <input class="form-control form-control-sm" type="file" name="img_name[]" id="formFile" multiple>
                            <em style="font-size: 10pt;">File format: png, jpeg (Each image size must below 1MB)</em><br>
                            <em style="font-size: 10pt;">*Please provide 200x400 pixel sizes of coupon</em><br>
                            <em style="font-size: 10pt;">*Every coupon are require to put company name or items name or brand on it</em><br>
                            <em style="font-size: 10pt;">Click <a href="https://hariusahawannegara.com.my/assets/img/coupon.jpeg">here</a> to see example</em>
                        {{-- </div> --}}

                        {{-- <div id="newRow"></div>
                        <button id="addRow" type='button' class='btn btn-sm'><i class="bi bi-plus-lg pr-2"></i>Add Row</button> --}}
                    
                    </div>
                </div>

                <div class="fw-bold px-2 py-2" style="background-color: orange">Booth Details / <em style="font-size: 10pt;">Maklumat Gerai</em></div>
                
                <div class="row p-3">        
                    <div class="col-md-12 pb-2">
                        @foreach ($booth as $booths)
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm">
                                <thead class="bg-dark text-white">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">{{ $booths->booth_name }}</th>
                                        <th scope="col">Lot Placement</th>
                                        <th scope="col">Price (RM)</th>
                                        <th scope="col" class="text-center">Check</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($booth_details as $booth_detail)                                                    
                                    @if ($booths->booth_id == $booth_detail->booth_id)    
                                    <tr>
                                        <th scope="row">{{ $count++ }}</th>
                                        <td>{{ $booth_detail->booth_type }}</td>
                                        <td>{{ $booth_detail->lot_placement }}</td>
                                        <td>{{ number_format($booth_detail->price) }}</td>
                                        <td id="catlist" class="text-center">
                                            {{-- <input type="radio" class="check" value="{{ $booth_detail->price }}"> --}}
                                            <input type="radio" name="details_id" value="{{ $booth_detail->details_id }}">
                                            {{-- <input type="text" name="booth_id" value="{{ $booth_detail->booth_id }}">
                                            <input type="text" name="details_id" value="{{ $booth_detail->details_id }}"> --}}
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @endforeach
                    </div>
                        
                    {{-- <div class="col-md-12 text-end">
                        <p>Total Amount (RM)</p>
                        <h2>
                            <span id="total"></span>
                            <input id="totalz" type="hidden" name="amount" value="">
                        </h2>
                    </div> --}}
                </div>

                <div class="col-md-12">
                    <div class="pull-right">
                        <button type="submit" id="save" class="btn btn-warning fw-bold">Next <i class="bi bi-chevron-double-right"></i></button>
                    </div>
                </div>
                
            </div>
        </form>
    </div>
</div>

<!-- Enable function to add row ------------------------------------------>
{{-- <script type="text/javascript">
    // add row
    $("#addRow").click(function () {
        var html = '';
        html += '<div id="inputFormRow">';
        html += '<div class="input-group mb-3">';
        html += '<input type="file" name="feature[]" class="form-control form-control-sm" autocomplete="off" aria-describedby="button-addon2" id="formFile" required>';
        html += '<button id="removeRow" type="button" class="btn btn-danger btn-sm" id="button-addon2"><i class="bi bi-x-lg"></i></button>';
        html += '</div>';
        html += '</div>';

        $('#newRow').append(html);
    });

    // remove row
    $(document).on('click', '#removeRow', function () {
        $(this).closest('#inputFormRow').remove();
    });
</script> --}}

<!-- Enable function to calculate amount ------------------------------------------>
{{-- <script>
    $('input:radio').on('change', function () {
        var sum = 0;


        $('.check').each(function () {

            if (this.checked) sum = sum + parseFloat($(this).val());

        });

        $('#total').html(sum)

    }).trigger("change")

    $(document).ready(function(){
        $("#save").mouseover(function(){
            var totalamount = $('#total').html();
            $("#totalz").val(totalamount);
        });
    });

    

</script> --}}
@endsection