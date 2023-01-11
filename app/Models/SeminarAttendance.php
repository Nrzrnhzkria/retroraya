<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class SeminarAttendance extends Model
{
    use HasFactory;
    protected $table = 'seminar_attendance';

    protected $fillable = [
        'user_id',
        'seminar_id', 
    ];

    public static function insertDB(Request $request){
        try{
            SeminarAttendance::create([
                'user_id' => $request['user_id'],
                'seminar_id' => $request['seminar_id'], 
            ]);

            $data = ['status' => true, 'message' => "Joined a seminar."]; 
            return $data;
            
        } catch(QueryException $ex){ 
            $data = ['status' => false, 'message' => $ex]; 
            return $data;
        } 
    }
}
