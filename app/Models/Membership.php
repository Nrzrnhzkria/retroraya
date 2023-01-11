<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class Membership extends Model
{
    use HasFactory;
    protected $table = 'membership';

    protected $fillable = [
        'payer_id',  
        'amount',
        'status',
        'senangpay_id', 
        'booth_id',
        'details_id',
    ];

    public static function insertDB(Request $request){
        try{
            Membership::create([
                'payer_id' => $request['payer_id'],
                'amount' => $request['amount'],
                'senangpay_id' => $request['senangpay_id'], 
            ]);

            $data = ['status' => true, 'message' => "Payment success."]; 
            return $data;

        } catch(QueryException $ex){ 
            $data = ['status' => false, 'message' => $ex]; 
            return $data;
        }  
    }
}
