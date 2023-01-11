<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class Coupon extends Model
{
    use HasFactory;
    protected $table = 'coupon';

    protected $fillable = [
        'vendor_id',
        'coupon_no',
        'img_name', 
        'category',
    ];

    public static function insertDB(Request $request){

        try{
            Coupon::create([
                'vendor_id' => $request['vendor_id'],
                'coupon_no' => $request['coupon_no'],
                'img_name' => $request['img_name'], 
                'category' => $request['category'], 
            ]);

            $data = ['status' => true, 'message' => "Coupon inserted."]; 
            return $data;

        } catch(QueryException $ex){ 
            $data = ['status' => false, 'message' => $ex]; 
            return $data;
        }  
    }

    public static function searchDB(Request $request){

        try{
            $coupons = Coupon::leftJoin('redeems','coupon.id','=','redeems.coupon_id')
            ->select('coupon.id','coupon.coupon_no','coupon.img_name','coupon.category')
            ->where('redeems.user_id', null)
            ->orWhere('redeems.user_id', '<>', $request['user_id'])
            ->get(); 

            $data = ['status' => true, 'message' => "List of available coupons.", 'coupons' => $coupons]; 
            return $data;

        } catch(QueryException $ex){ 
            $data = ['status' => false, 'message' => $ex]; 
            return $data;
        }  
    }
}
