<?php

namespace App\Http\Controllers\V1;

use App\Exceptions\ServiceException;
use App\Model\UserModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function login(){
        $data = validtor([
            'password'=>'length:32',
            'phone'=>''
        ],'POST');
        $user = UserModel::where('phone',$data['phone'])->first();
        if (empty($user)){
            throw new ServiceException('用户不存在');
        }
        if (md5($data['password'] . $user->salt) != $user->password){
            throw new ServiceException('密码错误');
        }
        $token = \Jwt::getToken(['user_id'=>$user->id]);
        return jsonResponse(['token'=>$token]);
    }


    public function register(){
        $data = validtor([
            'password'=>'lenght:32',
            'phone'=>''
        ],'POST');
        $user = UserModel::where('phone',$data['phone'])->first();
        if (!empty($user)){
            throw new ServiceException('用户已存在');
        }
        $salt = str_random(6);
        $user = new UserModel();
        $user->phone = $data['phone'];
        $user->password = md5($data['password'] . $salt);
        $user->salt = $salt;
        $user->save();
        return jsonResponse();
    }
}
