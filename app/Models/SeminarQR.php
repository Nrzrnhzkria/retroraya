<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;


class SeminarQR extends Model
{
    use HasFactory;
    protected $table = 'seminar_qr';

    protected $fillable = [
        'seminar_name',
        'location_name',
        'qr_value',
        'seminar_date',
        'time_start',
        'time_end', 
        'max_participant',
        'registered_participant',
        'img_name'
    ];

    public static function insertDB(Request $request){
        try{
            SeminarQR::create([
                'seminar_name' => $request['seminar_name'],
                'location_name' => $request['location_name'],
                'qr_value' => $request['qr_value'],
                'seminar_date' => $request['seminar_date'],
                'time_start' => $request['time_start'], 
                'time_end' => $request['time_end'], 
                'max_participant' => $request['max_participant'], 
            ]);

            $data = ['status' => true, 'message' => "Inserted a seminar."]; 
            return $data;
            
        } catch(QueryException $ex){ 
            $data = ['status' => false, 'message' => $ex]; 
            return $data;
        } 
    }
}
