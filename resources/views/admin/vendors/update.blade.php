@extends('layouts.admin-panel')

@section('title')
    Vendors
@endsection

@section('content')

<div class="container pb-4">
    
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-4 pb-2 mb-3 border-bottom">
        <h1 class="h2">Vendor Information</h1>
    </div>

    <div class="row justify-content-center py-3">
        <div class="col-md-10">
            <div class="card py-3">
                <div class="card-body">
                    <form class="row g-3 px-3" method="POST" action="{{ url('edit-vendor') }}/{{ $vendor->id }}">
                        @csrf
                        
                        <h4 class="border-bottom">Personal Details</h4>
                        
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
                                <label>Name of Company:</label>
                                <input type="text" value="{{ $details->company_name }}" class="form-control form-control-sm" placeholder="Company Sdn Bhd"  name="company_name">
                            </div>
        
                            <div class="col-md-6 pb-2">
                                <label>Contact Person:</label>
                                <input type="text" value="{{ $vendor->name  }}" class="form-control form-control-sm" placeholder="Mohammad"  name="name">
                            </div>
                            <div class="col-md-6 pb-2">
                                <label>Designation:</label>
                                <input type="text" value="{{ $details->designation }}" class="form-control form-control-sm" name="designation"/>
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
                                <label>IC/Passport No.:</label>
                                <input type="text" value="{{ $vendor->ic_no }}" class="form-control form-control-sm" name="ic_no"/>
                            </div>
        
                            <div class="col-md-6 pb-2">
                                <label>Phone No.:</label>
                                <input type="text" value="{{ $vendor->phone_no }}" class="form-control form-control-sm" name="phone_no"/>
                            </div>
        
                            <div class="col-md-6 pb-2">
                                <label>Email:</label>
                                <input type="email" value="{{ $vendor->email }}" class="form-control form-control-sm" name="email" placeholder="example@gmail.com"/>
                            </div>
        
                            <div class="col-md-12 pb-2">
                                <label>Company Address:</label>
                                <textarea type="text" class="form-control form-control-sm" placeholder="Ali"  name="company_address">{{ $details->company_address }}</textarea>
                            </div>
        
                            <div class="col-md-6 pb-2">
                                <label>Nationality:</label>
                                <input type="text" value="{{ $details->nationality }}" class="form-control form-control-sm" name="nationality"/>
                                {{-- <select class="form-select form-select-sm" aria-label="Default select example" name="nationality" value="{{ $details->nationality }}">                                 
                                    <option disabled selected>-- Please Select --</option>
                                    <option value="local">Citizens</option>
                                    <option value="international">Non-citizens</option>
                                </select> --}}
                            </div>
        
                            <div class="col-md-6 pb-4">
                                <label>Nature of Business:</label>
                                <input type="text" value="{{ $details->business_nature }}" class="form-control form-control-sm" name="business_nature"/>
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
                                                <td class="text-center"><a href="{{ $details->product_details }}" class="btn btn-outline-dark btn-sm"><i class="bi bi-eye-fill"></i> View</a></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>SSM Certificate</td>
                                                <td class="text-center"><a href="{{ $details->ssm_cert }}" class="btn btn-outline-dark btn-sm"><i class="bi bi-eye-fill"></i> View</a></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Vaccine Certificate</td>
                                                <td class="text-center"><a href="{{ $details->vaccine_cert }}" class="btn btn-outline-dark btn-sm"><i class="bi bi-eye-fill"></i> View</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        
                        </div>
                        
                        <h4 class="border-bottom">Booth Details</h4>
                        
                        <div class="row p-3">
        
                            <div class="col-md-6 pb-2">
                                <label>Booth Name:</label>
                                <input type="text" value="{{ $booth_name->booth_name }}" class="form-control form-control-sm" name="booth_name" readonly/>
                            </div>   
                            
                            <div class="col-md-6 pb-2">
                                <label>Booth Type:</label>
                                <input type="text" value="{{ $booth_type->booth_type }}" class="form-control form-control-sm" name="booth_type" readonly/>
                            </div>  
        
                            <div class="col-md-6 pb-2">
                                <label>Bill ID:</label>
                                <input type="text" value="{{ $payment->senangpay_id }}" class="form-control form-control-sm" name="senangpay_id" readonly/>
                            </div>  

                            <div class="col-md-6 pb-2">
                                <label>Amount:</label>
                                <input type="text" value="RM {{ $payment->amount }}" class="form-control form-control-sm" name="amount" readonly/>
                            </div>  

                            {{-- <div class="col-md-4 pb-2">
                                <label>Status:</label>
                                <select class="form-select form-select-sm" aria-label="Default select example" name="status">                                 
                                    <option disabled selected>-- {{ $payment->status }} --</option>
                                    <option value="success">Success</option>
                                    <option value="failed">Failed</option>
                                </select>
                                {{-- <input type="text" value="{{ $payment->status }}" class="form-control form-control-sm" name="status"/>
                                <em style="font-size: 10pt">success/failed</em>
                            </div>  --}}

                        </div>

                        <div class="col-md-12">
                            <div class="pull-right">
                                <button type="submit" class="btn btn-primary float-right">
                                    <i class="bi bi-save"></i> Save Changes
                                </button>
                                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $vendor->id }}"><i class="bi bi-trash"></i></button>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{ $vendor->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure you want to delete this user ?</p>
                                            <p>This table may be affected after deletion :</p>
                                            <ul>
                                                <li>Coupon</li>
                                                <li>HUN News Likes</li>
                                                <li>Membership</li>
                                                <li>Redeem</li>
                                                <li>Seminar Attendance</li>
                                                <li>User</li>
                                                <li>Vendor Details</li>
                                            </ul>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <a class="btn btn-danger" href="{{ url('delete-vendor') }}/{{ $vendor->id }}">Delete</a>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection