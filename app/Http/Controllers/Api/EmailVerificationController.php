<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Http\Requests\Auth\EmailVerificationRequest;
use App\Models\User;
use Otp;

class EmailVerificationController extends Controller
{
    private $otp;
public function __construct(){
$this->otp=new Otp;

}
  public function email_verification(EmailVerificationRequest $request){

    $otp2=$this->otp->validate($request->email,$request->otp);
    if(!$otp2->status){
            return response()->json(['error'=>$this->otp],401);
    }
    $user=User::where('email',$request->email)->first();
    $user->update(["email_verified"=>1]);
    $success['success']=true;
    return response()->json($success,200);
    



  }
}
