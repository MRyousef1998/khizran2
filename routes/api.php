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

//
