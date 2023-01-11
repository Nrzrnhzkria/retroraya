<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class HUNNewsLikes extends Model
{
    use HasFactory;
    protected $table = 'hun_news_likes';

    protected $fillable = [
        'user_id',
        'news_id', 
    ];

    public static function insertDB(Request $request){

        try{
            HUNNewsLikes::create([
                'user_id' => $request['user_id'],
                'news_id' => $request['news_id'], 
            ]);

            $data = ['status' => true, 'message' => "News liked."]; 
            return $data;

        } catch(QueryException $ex){ 
            $data = ['status' => false, 'message' => $ex]; 
            return $data;
        }  
    }

    public static function deleteDB(Request $request){

        try{
            $delete = HUNNewsLikes::where('user_id', $request['user_id'])
            ->where('news_id', $request['news_id'])
            ->delete();

            if($delete){
                $data = ['status' => true, 'message' => "News disliked."]; 
                return $data;
            }

            $data = ['status' => true, 'message' => "Nothing to be deleted."]; 
            return $data;

        } catch(QueryException $ex){ 
            $data = ['status' => false, 'message' => $ex]; 
            return $data;
        }  
    }
}
