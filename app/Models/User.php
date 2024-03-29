<?php
namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject;


class User extends Authenticatable implements JWTSubject
{
use Notifiable;
use HasRoles;
/**
* The attributes that are mass assignable.
*
* @var array
*/
protected $guarded=[];
/**
* The attributes that should be hidden for arrays.
*
* @var array
*/
protected $hidden = [
'password', 'remember_token',
]; 
/**
* The attributes that should be cast to native types.
*
* @var array
*/
protected $casts = [
'email_verified_at' => 'datetime',
];

public function  role(){
    return $this->belongsTo(Role::class,'role_id','id');
   
}


public function getJWTIdentifier()
{
    return $this->getKey();
}

/**
 * Return a key value array, containing any custom claims to be added to the JWT.
 *
 * @return array
 */
public function getJWTCustomClaims()
{
    return [];
}
}