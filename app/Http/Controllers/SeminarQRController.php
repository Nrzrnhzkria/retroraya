<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SeminarQR;
use App\Models\SeminarAttendance;
use App\Models\User;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Auth;

class SeminarQRController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    // public function addQR(Request $request){
    //     return SeminarQR::insertDB($request);
    // }
    
    public function qrcode()
    {
        $seminarsqr = SeminarQR::orderBy('seminar_date', 'desc')->paginate(15);
        return view('admin.seminars.qrcode.view', compact('seminarsqr'));
    }

    public function create_qr()
    {
        // \QrCode::size(500)
        //     ->format('png')
        //     ->generate('https://hariusahawannegara.com.my/register-seminar/', public_path('images/qrcode.png'));

        $qr_value = uniqid();

        return view('admin.seminars.qrcode.create', compact('qr_value'));
    }

    public function store_qr(Request $request)
    {      
        $datavalidation = $request->validate([
            'seminar_name' => 'required',
            'location_name' => 'required',
            'max_participant' => 'required',
            'qr_value' => 'required',
            'seminar_date' => 'required',
            'time_start' => 'required',
            'time_end' => 'required',
            'img_name' => 'required'
        ]);

        $seminar_path = 'public/admin/seminars';
        $path = 'img_' . uniqid().'.'.$request->file('img_name')->extension();
        $request->file('img_name')->storeAs($seminar_path, $path);
        $seminar_image = 'https://hariusahawannegara.com.my/storage/admin/seminars/' . $path;

        SeminarQR::create([
            'seminar_name' => $request->seminar_name,
            'location_name' => $request->location_name,
            'max_participant' => $request->max_participant,
            'qr_value' => $request->qr_value,
            'seminar_date' => $request->seminar_date,
            'time_start' => $request->time_start,
            'time_end' => $request->time_end,
            'img_name' => $seminar_image,
        ]);

        return redirect('qrcode')->with('addqr','Seminar has been created successfully.');
    }

    public function update_qr($qr_id)
    {
        $qr = SeminarQR::where('id', $qr_id)->first();

        return view('admin.seminars.qrcode.update', compact('qr')); 
    }

    public function edit_qr($qr_id, Request $request)
    {          
        $qr = SeminarQR::where('id', $qr_id)->first();

        $datavalidation = $request->validate([
            'seminar_name' => 'required',
            'location_name' => 'required',
            'max_participant' => 'required',
            'qr_value' => 'required',
            'seminar_date' => 'required',
            'time_start' => 'required',
            'time_end' => 'required',
            'img_name' => 'required'
        ]);
        
        if($request->hasFile('img_name'))
        {
            $seminar_path = 'public/admin/seminars';
            $path = 'img_' . uniqid().'.'.$request->file('img_name')->extension();
            $request->file('img_name')->storeAs($seminar_path, $path);
            $seminar_image = 'https://hariusahawannegara.com.my/storage/admin/seminars/' . $path;
        }
        

        $qr->seminar_name = $request->seminar_name;
        $qr->location_name = $request->location_name;
        $qr->max_participant = $request->max_participant;
        $qr->qr_value = $request->qr_value;
        $qr->seminar_date = $request->seminar_date;
        $qr->time_start = $request->time_start;
        $qr->time_end = $request->time_end;
        if($request->hasFile('img_name'))
        {
            $qr->img_name = $seminar_image;
        }
        $qr->save();

        return redirect('qrcode')->with('updateqr','Seminar has been updated successfully.'); 
    }

    public function destroy_qr($qr_id){
        $seminar = SeminarAttendance::where('seminar_id', $qr_id);
        $qr = SeminarQR::where('id', $qr_id);
        
        $seminar->delete();
        $qr->delete();
        return redirect('qrcode')->with('deleteqr','Seminar has been deleted successfully.');
    }

    public function downloadQRCode(Request $request, $type, $qr_id)
    {
        $headers    = array('Content-Type' => ['png']);
        $type       = $type == 'jpg' ? 'png' : $type;
        $image      = \QrCode::format($type)
                    ->size(200)->errorCorrection('H')
                    ->generate($qr_id);

        $qr = SeminarQR::where('id', $qr_id)->first();

        $imageName = 'qr-' . $qr->location_name;
        // if ($type == 'svg') {
        //     $svgTemplate = new \SimpleXMLElement($image);
        //     $svgTemplate->registerXPathNamespace('svg', 'http://www.w3.org/2000/svg');
        //     $svgTemplate->rect->addAttribute('fill-opacity', 0);
        //     $image = $svgTemplate->asXML();
        // }

        \Storage::disk('public')->put($imageName, $image);

        return response()->download('storage/'.$imageName, $imageName.'.'.$type, $headers);
    }
    
    public function registeruser($qr_id){
		$user_id = Auth::user()->id;
        $get_user = User::where('id', $user_id)->first();

        SeminarAttendance::create([
            'user_id' => $user_id,
            'seminar_id' => $qr_id,
        ]);

        // $register->user_id = $user_id;
        // $register->seminar_id = $qr_id;
        // $register->save();

        return redirect('register-success/' . $qr_id . '/' . $user_id);
    }

    public function registersuccess($qr_id, $user_id){
        return view('admin.seminars.register_success');
    }
}
