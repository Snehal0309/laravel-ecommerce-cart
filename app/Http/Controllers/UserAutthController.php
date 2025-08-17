<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserAutthController extends Controller
{
    //
    function signup(Request  $request){
        $input = $request->all();
        $input['password']  =bcrypt($input['password']);
        $user = User::create($input);
        $sucess['token'] =$user->createToken('MyApp')->plainTectToken;
        $sucess['name']=$user->name;
        return['success'=>true,"result"=>$sucess,"msg"=>"USer register sucessfully"];
    }
}
