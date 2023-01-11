<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;    
use Illuminate\Http\Request;  
use Illuminate\Database\QueryException; 
use Illuminate\Support\Facades\Hash; 

use App\Models\User; 

class LoginController extends Controller
{    
    public function login(Request $request){ 
        try{
            $user = User::where('email',$request->email) 
            ->first();

            if (Hash::check($request->password, $user->password)){
                if($user){
                    $data = ['status' => true, 'message' => "Login success."]; 
                    return $data; 
                }
            }

        } catch(QueryException $ex){ 
            $data = ['status' => false, 'message' => $ex]; 
            return $data;
        }

        $data = ['status' => false, 'message' => "Login failed."]; 
        return $data; 
    }
}