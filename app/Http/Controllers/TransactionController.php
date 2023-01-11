<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use App\Models\Membership;
use Auth;

class TransactionController extends Controller
{
    public function create_bill(){
        $user_id = Auth::user()->id;
        $user = User::where('id', $user_id)->first();

        $bill_id = 'ID'.uniqid();

        Membership::create([
            'payer_id' => $user_id,
            'amount' => '51',
            'senangpay_id' => $bill_id,
        ]);

        $data = array(
            'userSecretKey' => config('toyyibpay.key'),
            'categoryCode' => config('toyyibpay.category'),
            'billName' => 'HUN Membership',
            'billDescription' => 'Hari Usahawan Negara 2022',
            'billPriceSetting' => 1,
            'billPayorInfo' => 1,
            'billAmount' => 5000,
            'billReturnUrl' => 'https://hariusahawannegara.com.my/membership-status',
            'billCallbackUrl' => 'https://hariusahawannegara.com.my/membership-callback',
            'billExternalReferenceNo' => $bill_id,
            'billTo' => $user->name,
            'billEmail' => $user->email,
            'billPhone' => $user->phone_no, // cannot null or 0
            'billSplitPayment' => 0,
            'billSplitPaymentArgs' => '',
            'billPaymentChannel' => 2,
            'billContentEmail' => 'Thank you for joining our to Membership!',
            'billChargeToCustomer' => 2
        );

        $url = 'https://toyyibpay.com/index.php/api/createBill';
        $response = Http::asForm()->post($url, $data);
        $bill_code = $response[0]['BillCode'];

        return redirect('https://toyyibpay.com/' . $bill_code);
    }

    public function payment_status(){
        // $response = request()->all(['status_id', 'billcode', 'order_id']);
        // return $response;
        return view('landingpage.register.membership');
    }

    public function callback(){
        $response = request()->all(['refno', 'status', 'reason', 'billcode', 'order_id', 'amount']);
        Log::info($response);
    }
}
