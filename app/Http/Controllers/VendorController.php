<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\VendorDetails;
use App\Models\Coupon;
use App\Models\CouponCategories;
use App\Models\Membership;
use App\Models\Booth;
use App\Models\BoothDetails;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;

class VendorController extends Controller
{
    /*
    |   This controller is for managing vendor details
    */

    public function register()
    {
        return view('landingpage.register.check_ic');
    }

    // Check if ic exist
    public function check_ic(Request $request)
    {
        $check = User::where('ic_no', $request->ic_no)->first();

        if(User::where('ic_no', $request->ic_no)->exists() && Membership::where('payer_id', $check->id)->where('status', 'success')->first()){
            // dd('Payment Success');
            return redirect('update-registration/' . $check->id);

        }elseif(User::where('ic_no', $request->ic_no)->exists() && Membership::where('payer_id', $check->id)->doesntExist()){
            // dd('IC exist but not as vendor');
            return redirect('new-registration/' . $request->ic_no);
            
        }elseif(User::where('ic_no', $request->ic_no)->exists() && Membership::where('payer_id', $check->id)->where('status', 'failed')->orWhere('status', NULL)->first()){
            // dd('Payment Pending');
            return redirect('update-payment/' . $check->id);
            
        }else{
            // dd('New IC');
            return redirect('new-registration/' . $request->ic_no);

        }
    }

    //----------------------------------- New Vendor -----------------------------------//

    public function new_register($get_ic, Request $request)
    {
        $vendor_ic = $get_ic;

        $booth = Booth::orderBy('id', 'desc')->get();
        $booth_details = BoothDetails::orderBy('id', 'desc')->get();
        $categories = CouponCategories::orderBy('id', 'asc')->get();

        $count = 1;

        return view('landingpage.register.new_vendor', compact('booth', 'booth_details', 'count', 'vendor_ic', 'categories'));
    }

    public function store_vendor($get_ic, Request $request){

        $booth_details = BoothDetails::where('details_id', $request->details_id)->first();
        $vendor = User::where('ic_no', $request->ic_no)->first();

        $datavalidation = $request->validate([
            'name' => 'required',
            'email'=> 'required|unique:users,email',
            'password'=> 'required',
            'ic_no' => 'required',
            'phone_no' => 'required',
            'role'=> 'required',
            'company_name'=> 'required',
            'designation' => 'required',
            'nationality'=> 'required',
            'company_address'=> 'required',
            'business_nature' => 'required',
            'product_details' => 'required|mimes:docx,csv,pdf,png,jpeg|max:1024',
            'ssm_cert' => 'required|mimes:docx,csv,pdf,png,jpeg|max:1024',
            'vaccine_cert' => 'required|mimes:docx,csv,pdf,png,jpeg|max:1024'
        ]);

        if(User::where('ic_no', $request->ic_no)->exists()){

            $vendor->name = $request->name;
            $vendor->email = $request->email;
            $vendor->phone_no = $request->phone_no;
            $vendor->ic_no = $request->ic_no;
            $vendor->save();

        }else{

            User::create([
                'hun_id' => NULL,
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->ic_no),
                'phone_no' => $request->phone_no,
                'ic_no' => $request->ic_no,
                'role' => 'Vendor',
            ]); 

        }
               

        $vendor = User::where('ic_no', $request->ic_no)->first();

        $product_path = 'public/files/product_details';
        $path_1 = 'file_' . uniqid().'.'.$request->file('product_details')->extension();
        $request->file('product_details')->storeAs($product_path, $path_1);
        $product_details = 'https://hariusahawannegara.com.my/storage/files/product_details/' . $path_1;

        $ssm_path = 'public/files/ssm_cert';
        $path_2 = 'file_' . uniqid().'.'.$request->file('ssm_cert')->extension();
        $request->file('ssm_cert')->storeAs($ssm_path, $path_2);
        $ssm_cert = 'https://hariusahawannegara.com.my/storage/files/ssm_cert/' . $path_2;
                
        $vaccine_path = 'public/files/vaccine_cert';
        $path_3 = 'file_' . uniqid().'.'.$request->file('vaccine_cert')->extension();
        $request->file('vaccine_cert')->storeAs($vaccine_path, $path_3);
        $vaccine_cert = 'https://hariusahawannegara.com.my/storage/files/vaccine_cert/' . $path_3;

        VendorDetails::create([
            'user_id' => $vendor->id,
            'company_name' => $request->company_name,
            'designation' => $request->designation,
            'nationality' => $request->nationality,
            'company_address' => $request->company_address,
            'business_nature' => $request->business_nature,
            'product_details' => $product_details,
            'ssm_cert' => $ssm_cert,
            'vaccine_cert' => $vaccine_cert
        ]);
        
        if($request->img_name == null){

        }else{

            foreach($request->file('img_name') as $values) {

                $destination_path = 'public/files/coupons';
                $imagename = 'img_' . uniqid().'.'.$values->extension();
                $path_4 = $values->storeAs($destination_path, $imagename);
                $coupon_image = 'https://hariusahawannegara.com.my/storage/files/coupons/' . $imagename;

                $i=1;

                Coupon::create([
                    'vendor_id' => $vendor->id,
                    'coupon_no' => $i++,
                    'img_name' => $coupon_image,
                    'category' => $request->category
                ]);

            }

        }

        Membership::create([
            'payer_id' => $vendor->id,
            'amount' => $booth_details->price,
            'senangpay_id' => 'no value',
            'booth_id' => $booth_details->booth_id,
            'details_id' => $request->details_id,
        ]); 

        return redirect('payment/' . $get_ic); 
    }

    public function create_bill($get_ic, Request $request){
        $vendor = User::where('ic_no', $get_ic)->first();
        $payment = Membership::where('payer_id', $vendor->id)->first();
        $booth_id = $payment->booth_id;
        $details_id = $payment->details_id;
        $booth_name = Booth::where('booth_id', $booth_id)->first();
        $booth_type = BoothDetails::where('details_id', $details_id)->first();

        $bill_id = 'ID'.uniqid();

        $payment->senangpay_id = $bill_id;
        $payment->save();
        
        $amount = ($payment->amount)*100;

        $data = array(
            'userSecretKey' => config('toyyibpay.key'),
            'categoryCode' => config('toyyibpay.category'),
            // 'userSecretKey' => 'a25txcs8-x59p-adcl-xwz7-1d3grr2p6c1p',
            // 'categoryCode' => 'vokse6qd',
            'billName' => 'HUN Vendor Registration',
            'billDescription' => $booth_name->booth_name . ' - ' . $booth_type->booth_type,
            'billPriceSetting' => 1,
            'billPayorInfo' => 1,
            'billAmount' => $amount,
            'billReturnUrl' => 'https://hariusahawannegara.com.my/payment-status',
            'billCallbackUrl' => 'https://hariusahawannegara.com.my/payment-callback',
            'billExternalReferenceNo' => $bill_id,
            'billTo' => $vendor->name,
            'billEmail' => $vendor->email,
            'billPhone' => $vendor->phone_no, // cannot null or 0
            'billSplitPayment' => 0,
            'billSplitPaymentArgs' => '',
            'billPaymentChannel' => 2,
            'billContentEmail' => 'Thank you for registering to HUN!',
            'billChargeToCustomer' => 2
        );

        $url = 'https://toyyibpay.com/index.php/api/createBill';
        $response = Http::asForm()->post($url, $data);
        $bill_code = $response->json()[0]['BillCode'];

        // dd($response->json()); // to know error
        return redirect('https://toyyibpay.com/' . $bill_code); // return url
    }

    public function payment_status(Request $request){
        $response = request()->all();
        // return $response;

        $status = request()->status_id;
        $bill_id = request()->order_id;
        $toyyib_billcode = request()->billcode;

        $payment = Membership::where('senangpay_id', $bill_id)->first();

        if($status == 1){
            
            $payment->status = 'success';
            $payment->toyyib_billcode = $toyyib_billcode;
            $payment->save();

            return view('landingpage.register.success');

        }else{

            $payment->status = 'failed';
            $payment->toyyib_billcode = $toyyib_billcode;
            $payment->save();

            return view('landingpage.register.failed');
        }
        
    }

    public function callback(){
        $response = request()->all(['refno', 'status', 'reason', 'billcode', 'order_id', 'amount']);
        Log::info($response);
    }
    
    //----------------------------------- Existing Vendor -----------------------------------//
    public function update_register($user_id, Request $request){

        $vendor = User::where('id', $user_id)->first();
        $details = VendorDetails::where('user_id', $user_id)->first();
        $payment = Membership::where('payer_id', $user_id)->first();
        $coupon = Coupon::where('vendor_id', $user_id)->get();
        $categories = CouponCategories::orderBy('id', 'asc')->get();

        $booth_id = $payment->booth_id;
        $details_id = $payment->details_id;
        $booth_name = Booth::where('booth_id', $booth_id)->first();
        $booth_type = BoothDetails::where('details_id', $details_id)->first();
  
        return view('landingpage.register.exist_vendor', compact('vendor', 'details', 'payment', 'coupon', 'categories', 'booth_name', 'booth_type'));
    }

    public function store_update($user_id, Request $request)
    {
        $vendor = User::where('id', $user_id)->first();
        $coupon = Coupon::where('vendor_id', $user_id)->first();

        if($request->img_name == null){

        }else{

            foreach($request->file('img_name') as $values) {
                $datavalidation = $request->validate([
                    'category' => 'required',
                    'img_name' => 'required|max:1024'
                ]);

                $destination_path = 'public/files/coupons';
                $imagename = 'img_' . uniqid().'.'.$values->extension();
                $path_5 = $values->storeAs($destination_path, $imagename);
                $coupon_image = 'https://hariusahawannegara.com.my/storage/files/coupons/' . $imagename;

                $i=1;

                Coupon::create([
                    'vendor_id' => $user_id,
                    'coupon_no' => $i++,
                    'img_name' => $coupon_image,
                    'category' => $request->category
                ]);

            }

        }

        return redirect('update-registration/'.  $user_id)->with('update','Your registration has been updated successfully.');
    }

    //----------------------------------- Update Pending Payment -----------------------------------//
    public function update_payment($user_id, Request $request){
  
        $payment = Membership::where('payer_id', $user_id)->first();
        return view('landingpage.register.pending_payment', compact('payment'));

    }

}
