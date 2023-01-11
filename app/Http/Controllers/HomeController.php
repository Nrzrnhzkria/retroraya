<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HUNNews;
use App\Models\Media;
use App\Models\Banner;
use App\Models\Booth;
use App\Models\BoothDetails;

class HomeController extends Controller
{
    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        $news = HUNNews::orderBy('id', 'desc')->get();
        $banners = Banner::orderBy('id', 'asc')->get();
        $totalbanners = Banner::orderBy('id', 'desc')->count();
        $count = 1;

        return view('landingpage.home', compact('news', 'banners' , 'totalbanners', 'count'));
    }

    public function preface()
    {
        return view('landingpage.about.preface');
    }

    public function intro()
    {
        return view('landingpage.about.intro');
    }

    public function organization()
    {
        return view('landingpage.about.organization');
    }

    public function objective()
    {
        return view('landingpage.about.objective');
    }

    public function vision_mission()
    {
        return view('landingpage.about.vision_mission');
    }

    public function events()
    {
        return view('landingpage.events');
    }

    public function news()
    {
        $news = HUNNews::orderBy('id', 'desc')->get();
        return view('landingpage.news.news', compact('news'));
    }

    public function readmore($news_id)
    {
        $news = HUNNews::where('id', $news_id)->first();
        return view('landingpage.news.readmore', compact('news'));
    }

    public function media()
    {
        $medias = Media::orderBy('id', 'desc')->get();
        return view('landingpage.media.media', compact('medias'));
    }

    public function readmedia($media_id)
    {
        $media = Media::where('id', $media_id)->first();
        return view('landingpage.media.readmedia', compact('media'));
    }
    
    public function contact()
    {
        return view('landingpage.contact');
    }

    public function policy()
    {
        return view('landingpage.policy');
    }

    public function booth()
    {
        $booth = Booth::orderBy('id', 'desc')->get();
        $booth_details = BoothDetails::orderBy('id', 'desc')->get();

        $count = 1;

        return view('landingpage.booth', compact('booth', 'booth_details', 'count'));
    }

}
