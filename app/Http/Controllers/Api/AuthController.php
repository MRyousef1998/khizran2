<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;



use App\Http\Controllers\Controller;
use  App\Http\Resources\UserApiResource;
use App\Models\User;
use Illuminate\Http\Request;

use App\Providers\RouteServiceProvider;


use App\Mail\SinupEmail;

use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
      return  $request;
        $request->validate([

           
                'first_name' => ['required'],
                'last_name' => ['required'],
                'phone' => ['required'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8'], ]);
        
       $user= new User();
       
           $user-> first_name = $request->input('first_name');
           $user-> last_name= $request->input('last_name');
           $user-> email = $request->input('email');
           $user-> password = Hash::make($request->input('password'));
           $user->verification_code = sha1(time());
        $user-> mobile = $request->input('phone');
        
           $user->save();
           $credentials =$request->only('email','password');
           if(Auth::attempt($credentials)){
                  $user=User::where(
                      'email',$request->input('email')

                  )->first();
                  
                  $user = Auth::user();
                  //return $user;
                  $token=$user->createToken('api_token');
          $user->api_token=$token->plainTextToken;
          $user->save();
         
         return new UserApiResource($user);
           if($user != null){
            //App\Http\Controllers\Api\MailController::sendSingupEmail($user->first_name, $user->email, $user->verification_code);
           
           
            $data = [
                'name' => $user->first_name,
                'verification_code' => $user->verification_code
            ];
           Mail::to($user->email)->send(new \App\Mail\SinupEmail($data));
      
         
           // Mail::to($user->email)->send(new SinupEmail($data));
           
           
            $message = [
                'error'=>false,
              'message'=>'we send code to verifiction'
            ];
            return response($message,200);
        }

        
        $message = [
            'error'=>true,
          'message'=>'some thing rong'
        ];
   return response($message,404);


           


           }
           
          
         
         // return ['token' => $token->plainTextToken];
          //  $user->api_token=bin2hex(openssl_random_pseudo_bytes(30));
            
     
            return new UserApiResource($user);

    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required'],
            'password' => ['required' ],
             ]);

             $userName=$request->input('email');
             $password=$request->input('password');
             $credentials =$request->only('email','password');
             if(Auth::attempt($credentials)){
                    $user=User::where(
                        'email',$userName

                    )->first();
                    return new UserApiResource($user);

             }
           $message = [
                 'error'=>true,
               'message'=>'user not exsit'
             ];
        return response($message,404);

    }
}
