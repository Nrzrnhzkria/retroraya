<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Coupon;
use App\Models\HUNNews;
use App\Models\HUNNewsLikes;
use App\Models\Media;
use App\Models\Membership;
use App\Models\Redeem;
use App\Models\SeminarAttendance;
use App\Models\Booth;
use App\Models\BoothDetails;
use App\Models\VendorDetails;
use App\Exports\MembersExport;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        $totalcoupon = Coupon::all()->count();
        $totalvendor = VendorDetails::all()->count();

        $user = User::where('role', 'User')->count();
        $member = User::Where('role', 'Member')->count();
        $totaluser = $user + $member; // User from mobile apps

        $nonmember = User::where('role', 'User')->count();
        $member = User::where('role', 'Member')->count();

        $automotive = Coupon::where('category','Automotive')->count();
        $bss = Coupon::where('category','Business Support & Supplies')->count();
        $ce = Coupon::where('category','Computers & Electronics')->count();
        $cc = Coupon::where('category','Construction & Contractors')->count();
        $education = Coupon::where('category','Education')->count();
        $entertainment = Coupon::where('category','Entertainment')->count();
        $fnd = Coupon::where('category','Food & Dining')->count();
        $hnm = Coupon::where('category','Health & Medicine')->count();
        $hng = Coupon::where('category','Home & Garden')->count();
        $lnf = Coupon::where('category','Legal & Financial')->count();
        $mwd = Coupon::where('category','Manufacturing, Wholesale & Distribution')->count();
        $merchant = Coupon::where('category','Merchants (Retail)')->count();
        $estate = Coupon::where('category','Real Estate')->count();
        $travel = Coupon::where('category','Travel & Transportation')->count();

        return view('admin.dashboard', compact('totalcoupon', 'totalvendor', 'totaluser', 'member', 'nonmember', 'automotive', 'bss', 'ce', 'cc', 'education', 'entertainment', 'fnd', 'hnm', 'hng', 'lnf', 'mwd', 'merchant', 'estate', 'travel'));
    }

    public function vendors()
    {
        $payments = Membership::where('amount', '>', '51')->paginate(15);
        $vendors = VendorDetails::orderBy('id', 'desc')->get();
        $booth_types = BoothDetails::orderBy('id', 'desc')->get();
        $count = 1;

        return view('admin.vendors.view', compact('payments', 'vendors', 'booth_types', 'count'));
    }

    public function update_vendor($vendor_id)
    {
        $vendor = User::where('id', $vendor_id)->first();
        $details = VendorDetails::where('user_id', $vendor_id)->first();
        $payment = Membership::where('payer_id', $vendor_id)->first();
        $coupon = Coupon::where('vendor_id', $vendor_id)->get();

        $booth_id = $payment->booth_id;
        $details_id = $payment->details_id;
        $booth_name = Booth::where('booth_id', $booth_id)->first();
        $booth_type = BoothDetails::where('details_id', $details_id)->first();

        return view('admin.vendors.update', compact('vendor', 'details', 'payment', 'coupon', 'booth_name', 'booth_type'));
    }

    public function edit_vendor($vendor_id, Request $request)
    {
        $datavalidation = $request->validate([
            'name' => 'required',
            'email'=> 'required',
            'ic_no' => 'required',
            'phone_no' => 'required',
            'company_name'=> 'required',
            'designation' => 'required',
            'nationality'=> 'required',
            'company_address'=> 'required',
            'business_nature' => 'required'
        ]);

        $vendor = User::where('id', $vendor_id)->first();
        $details = VendorDetails::where('user_id', $vendor_id)->first();
        // $payment = Membership::where('payer_id', $vendor_id)->first();

        $vendor->name = $request->name;
        $vendor->email = $request->email;
        $vendor->phone_no = $request->phone_no;
        $vendor->ic_no = $request->ic_no;
        $vendor->save();

        $details->company_name = $request->company_name;
        $details->designation = $request->designation;
        $details->nationality = $request->nationality;
        $details->company_address = $request->business_nature;
        $details->save();

        // $payment->status = $request->status;
        // $payment->save();

        return redirect('vendors')->with('updatevendor','Vendor has been updated successfully.'); 
    }

    public function destroy_vendor($vendor_id){
        $vendor = User::where('id', $vendor_id);
        $vendordetails = VendorDetails::where('user_id', $vendor_id);
        $coupon = Coupon::where('vendor_id', $vendor_id);
        $member = Membership::where('payer_id', $vendor_id);
        $news = HUNNews::where('user_id', $vendor_id);
        $newslikes = HUNNewsLikes::where('user_id', $vendor_id);
        $media = Media::where('user_id', $vendor_id);
        $redeem = Redeem::where('user_id', $vendor_id);
        $attendance = SeminarAttendance::where('user_id', $vendor_id);
        
        $coupon->delete();
        $member->delete();
        $news->delete();
        $newslikes->delete();
        $media->delete();
        $redeem->delete();
        $attendance->delete();
        $vendordetails->delete();
        $vendor->delete();

        return redirect('vendors')->with('deletevendor','Vendor has been deleted successfully.');
    }

    public function admins()
    {
        $admins = User::orderBy('id', 'desc')->where('role', 'superadmin')->orWhere('role', 'admin')->orWhere('role', 'advisor')->paginate(10);
        // $totaladmin = User::where('role', 'superadmin')->where('role', 'admin')->where('role', 'advisor')->count();

        return view('admin.admins.view', compact('admins'));
    }
    
    public function create_admin()
    {
        return view('admin.users.create');
    }

    public function store_admin(Request $request)
    {
        $datavalidation = $request->validate([
            'name' => 'required',
            'email'=> 'required|unique:users,email',
            'password'=> 'required',
            'ic_no' => 'required',
            'phone_no' => 'required',
            'role'=> 'required',
        ]);

        User::create([
            'hun_id' => NULL,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone_no' => $request->phone_no,
            'ic_no' => $request->ic_no,
            'role' => $request->role,
        ]);

        return redirect('admins')->with('addsuccess','User has been added successfully.');
    }

    public function update_admin($user_id)
    {
        $user = User::where('id', $user_id)->first();

        return view('admin.admins.update', compact('user')); 
    }

    public function edit_admin($user_id, Request $request)
    {
        $datavalidation = $request->validate([
            'name' => 'required',
            'email'=> 'required|unique:users,email',
            // 'password'=> 'required',
            'ic_no' => 'required',
            'phone_no' => 'required',
            'role'=> 'required',
        ]);

        $user = User::where('id', $user_id)->first();

        $user->name = $request->name;
        $user->email = $request->email;
        // $user->password = Hash::make($request['password']);
        $user->phone_no = $request->phone_no;
        $user->ic_no = $request->ic_no;
        $user->role = $request->role;
        $user->save();

        return redirect('admins')->with('updatesuccess','User has been updated successfully.'); 
    }

    public function destroy_admin($user_id){

        $coupon = Coupon::where('vendor_id', $user_id);
        $news = HUNNews::where('user_id', $user_id);
        $newslikes = HUNNewsLikes::where('user_id', $user_id);
        $media = Media::where('user_id', $user_id);
        $membership = Membership::where('payer_id', $user_id);
        $redeem = Redeem::where('user_id', $user_id);
        $attendance = SeminarAttendance::where('user_id', $user_id);
        $vendor_details = VendorDetails::where('user_id', $user_id);
        $user = User::where('id', $user_id);
        
        $coupon->delete();
        $news->delete();
        $newslikes->delete();
        $media->delete();
        $membership->delete();
        $redeem->delete();
        $attendance->delete();
        $vendor_details->delete();
        $user->delete();
        
        return redirect('admins')->with('deleteuser','User has been deleted successfully.');
    }

    public function users()
    {
        $users = User::orderBy('id', 'desc')->where('role', 'User')->orwhere('role', 'Member')->paginate(10);
        $totaluser = User::where('role', 'User')->count();
        $member = User::where('role', 'Member')->count();
        $nonmember = User::where('role', 'User')->count();

        return view('admin.users.view', compact('users', 'member','nonmember'));
    }
    
    public function members()
    {
        $members = User::orderBy('id', 'desc')->where('role', 'Member')->paginate(10);

        return view('admin.users.members', compact('members'));
    }

    public function export_members()
    {
        return Excel::download(new MembersExport, 'HUN_Members.xlsx');

    }

    public function non_members()
    {
        $users = User::orderBy('id', 'desc')->where('role', 'User')->paginate(10);

        return view('admin.users.non_members', compact('users'));
    }

    public function update_user($user_id)
    {
        $user = User::where('id', $user_id)->first();

        return view('admin.users.update', compact('user')); 
    }

    public function edit_user($user_id, Request $request)
    {
        $datavalidation = $request->validate([
            'name' => 'required',
            // 'email'=> 'required|unique:users,email',
            // 'password'=> 'required',
            'ic_no' => 'required',
            'phone_no' => 'required',
            'role'=> 'required',
        ]);
        
        $user = User::where('id', $user_id)->first();

        $user->hun_id = $request->hun_id;
        $user->name = $request->name;
        // $user->email = $request->email;
        // $user->password = Hash::make($request['password']);
        $user->phone_no = $request->phone_no;
        $user->ic_no = $request->ic_no;
        $user->role = $request->role;
        $user->save();

        return redirect('users')->with('updatesuccess','User has been updated successfully.'); 
    }

    public function destroy_user($user_id){

        $coupon = Coupon::where('vendor_id', $user_id);
        $news = HUNNews::where('user_id', $user_id);
        $newslikes = HUNNewsLikes::where('user_id', $user_id);
        $media = Media::where('user_id', $user_id);
        $membership = Membership::where('payer_id', $user_id);
        $redeem = Redeem::where('user_id', $user_id);
        $attendance = SeminarAttendance::where('user_id', $user_id);
        $vendor_details = VendorDetails::where('user_id', $user_id);
        $user = User::where('id', $user_id);
        
        $coupon->delete();
        $news->delete();
        $newslikes->delete();
        $media->delete();
        $membership->delete();
        $redeem->delete();
        $attendance->delete();
        $vendor_details->delete();
        $user->delete();

        return redirect('users')->with('deleteuser','User has been deleted successfully.');

    }
}
