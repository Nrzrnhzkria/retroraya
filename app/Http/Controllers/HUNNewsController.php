<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HUNNews;
use Auth;

class HUNNewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function news()
    {
        $news = HUNNews::orderBy('id', 'desc')->paginate(15);
        return view('admin.news.view', compact('news'));
    }

    public function create_news()
    {
        return view('admin.news.create');
    }

    public function store_news(Request $request)
    { 
        $this->validate($request, [
            'title' => 'required|string|max:100',
            'teaser' => 'required|string|max:250',
            'content' => 'required',
            'img_name' => 'required',
        ]);    

		$user_id = Auth::user()->id;

        $news_path = 'public/admin/news';
        $path = 'img_' . uniqid().'.'.$request->file('img_name')->extension();
        $request->file('img_name')->storeAs($news_path, $path);
        $news_image = 'https://hariusahawannegara.com.my/storage/admin/news/' . $path;

        HUNNews::create([
            'user_id' => $user_id,
            'title' => $request->title,
            'content' => $request->content,
            'teaser' => $request->teaser,
            'img_name' => $news_image,
        ]);

        return redirect('admin-news')->with('addnews','News has been created successfully.');
    }

    public function update_news($news_id)
    {
        $news = HUNNews::where('id', $news_id)->first();

        return view('admin.news.update', compact('news')); 
    }

    public function edit_news($news_id, Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:100',
            'teaser' => 'required|string|max:250',
            'content' => 'required',
            'img_name' => 'required',
        ]); 
        
        $news = HUNNews::where('id', $news_id)->first();
        $user_id = Auth::user()->id;

        if($request->hasFile('img_name'))
        {
            $news_path = 'public/admin/news';
            $path = 'img_' . uniqid().'.'.$request->file('img_name')->extension();
            $request->file('img_name')->storeAs($news_path, $path);
            $news_image = 'https://hariusahawannegara.com.my/storage/admin/news/' . $path;
        }

        $news->user_id = $user_id;
        $news->title = $request->title;
        $news->content = $request->content;
        $news->teaser = $request->teaser;
        if($request->hasFile('img_name'))
        {
            $news->img_name = $news_image;
        }
        $news->save();

        return redirect('admin-news')->with('updatenews','News has been updated successfully.'); 
    }

    public function destroy_news($news_id){
        $news = HUNNews::where('id', $news_id);
        
        $news->delete();
        return redirect('admin-news')->with('deletenews','News has been deleted successfully.');
    }
}
