<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;

class BannerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function banners()
    {
        $banners = Banner::orderBy('id', 'desc')->paginate(15);
        return view('admin.banners.view', compact('banners'));
    }

    public function store_banner(Request $request)
    { 
        $this->validate($request, [
            'img_name' => 'required',
        ]);    

        $banner_path = 'public/admin/banners';
        $path = 'img_' . uniqid().'.'.$request->file('img_name')->extension();
        $request->file('img_name')->storeAs($banner_path, $path);
        $banner_image = 'https://hariusahawannegara.com.my/storage/admin/banners/' . $path;

        Banner::create([
            'img_name' => $banner_image,
        ]);

        return redirect('banners')->with('addbanner','Banner has been created successfully.');
    }

    public function destroy_banner($banner_id){
        $banner = Banner::where('id', $banner_id);
        
        $banner->delete();
        return redirect('banners')->with('deletebanner','Banner has been deleted successfully.');
    }
}
