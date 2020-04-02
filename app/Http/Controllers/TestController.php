<?php

namespace App\Http\Controllers;

use App\Jobs\test;


use App\Library\Reflection\Student;
use App\Library\Session\Token;
use App\Model\UserModel;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
//        $res = \Jwt::getToken(['user_id' => '188', 'phone' => '18826252068']);
//        var_dump($res);
        $token = new Token();
        $token = $token->getToken(11);
        dd($token);
    }

    public function test()
    {
        $token = new Token();
        $user_id = $token->getUserid();

        \Cache::put('test',1,200);
        var_dump(\Cache::get('test'));
        \Cache::put('test',2,1);
        var_dump(\Cache::get('test'));
    }


}
