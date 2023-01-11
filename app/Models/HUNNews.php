<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

use DB;

class HUNNews extends Model
{
    use HasFactory;
    protected $table = 'hun_news';

    protected $fillable = [
        'user_id',
        'title',
        'content',
        'teaser',
        'img_name', 
    ];

    public static function insertDB(Request $request){
        try{
            HUNNews::create([
                'user_id' => "1",
                'title' => "Test",
                'content' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris elementum quis massa quis suscipit. Etiam et sem bibendum, convallis elit eget, sodales urna. Suspendisse pretium fermentum sapien non lacinia",
                'teaser' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris elementum quis massa quis suscipit. Etiam et sem bibendum, convallis elit eget, sodales urna. Suspendisse pretium fermentum sapien non lacinia",
                'img_name' => "img.jpg",
            ]);

            $data = ['status' => true, 'message' => "News added."]; 
            return $data;

        } catch(QueryException $ex){ 
            $data = ['status' => false, 'message' => $ex]; 
            return $data;
        }  
    }

    public static function searchDB(Request $request){
        try{
            $news = DB::table('hun_news')
            ->leftJoin('hun_news_likes', 'hun_news.id', '=', 'hun_news_likes.news_id')
            ->select('hun_news.*', DB::raw("count(hun_news_likes.news_id) as likes"))
            ->where('hun_news_likes.news_id', null)
            ->orWhere('hun_news_likes.news_id', '<>', null)
            ->groupBy('hun_news.id')
            ->get();
            
            $data = ['status' => true, 'message' => "List of news.", 'news' => $news]; 
            return $data;

        } catch(QueryException $ex){ 
            $data = ['status' => false, 'message' => $ex]; 
            return $data;
        }  
    }
}
