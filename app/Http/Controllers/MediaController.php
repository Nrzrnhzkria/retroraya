<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Media;
use Auth;

class MediaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function media()
    {
        $medias = Media::orderBy('id', 'desc')->paginate(15);
        return view('admin.media.view', compact('medias'));
    }

    public function create_media()
    {
        return view('admin.media.create');
    }

    public function store_media(Request $request)
    {      
        $this->validate($request, [
            'title' => 'required|string|max:100',
            'teaser' => 'required|string|max:250',
            'content' => 'required',
            'img_name' => 'required',
        ]); 

		$user_id = Auth::user()->id;

        $media_path = 'public/admin/media';
        $path = 'img_' . uniqid().'.'.$request->file('img_name')->extension();
        $request->file('img_name')->storeAs($media_path, $path);
        $media_image = 'https://hariusahawannegara.com.my/storage/admin/media/' . $path;

        Media::create([
            'user_id' => $user_id,
            'title' => $request->title,
            'content' => $request->content,
            'teaser' => $request->teaser,
            'img_name' => $media_image,
        ]);

        return redirect('admin-media')->with('addmedia','Media has been created successfully.');
    }

    public function update_media($media_id)
    {
        $media = Media::where('id', $media_id)->first();

        return view('admin.media.update', compact('media')); 
    }

    public function edit_media($media_id, Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:100',
            'teaser' => 'required|string|max:250',
            'content' => 'required',
            'img_name' => 'required',
        ]); 
        
        $media = Media::where('id', $media_id)->first();
        $user_id = Auth::user()->id;

        if($request->hasFile('img_name'))
        {
            $media_path = 'public/admin/media';
            $path = 'img_' . uniqid().'.'.$request->file('img_name')->extension();
            $request->file('img_name')->storeAs($media_path, $path);
            $media_image = 'https://hariusahawannegara.com.my/storage/admin/media/' . $path;
        }

        $media->user_id = $user_id;
        $media->title = $request->title;
        $media->content = $request->content;
        $media->teaser = $request->teaser;
        if($request->hasFile('img_name'))
        {
            $media->img_name = $media_image;
        }
        $media->save();

        return redirect('admin-media')->with('updatemedia','Media has been updated successfully.'); 
    }

    public function destroy_media($media_id){
        $media = Media::where('id', $media_id);
        
        $media->delete();
        return redirect('admin-media')->with('deletemedia','Media has been deleted successfully.');
    }
}
