<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class Redeem extends Model
{
    use HasFactory;
    protected $table = 'redeems';

    protected $fillable = [
        'user_id',
        'coupon_id', 
    ];

    public static function insertDB(Request $request){

        try{
            Redeem::create([
                'user_id' => $request['user_id'],
                'coupon_id' => $request['coupon_id'], 
            ]);

            $data = ['status' => true, 'message' => "Coupon used."]; 
            return $data;

        } catch(QueryException $ex){ 
            $data = ['status' => false, 'message' => $ex]; 
            return $data;
        }  
    }
}
