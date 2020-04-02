<?php
/**
 * Created by PhpStorm.
 * User: hw201902
 * Date: 2020/1/21
 * Time: 10:24
 */

namespace App\Library\Session;


class Token
{
    private $key = '123456';
    private $duration = 120;
    public function getToken($user_id){
        $token = md5($user_id.$this->key.time());
        $data = array(
            'user_id'=>$user_id,
            'expire_time'=>time()+60*$this->duration
        );
        \Cache::put($token,$data,$this->duration);
        return base64_encode($token);
    }

    public function getTokenData(){
        $token = base64_decode(request()->header('Authorization'));
        if (empty($token)){
            return false;
        }
        $cache = \Cache::get($token);
        return $cache;
    }

    public function getUserid(){
        $cache = $this->getTokenData();
        return empty($cache)?false:$cache['user_id'];
    }


    public function set($key,$value){
        $token = base64_decode(request()->header('Authorization'));
        if (empty($token)){
            return false;
        }
        $cache = \Cache::get($token);
        if (empty($cache)){
            return false;
        }
        $cache[$key] = $value;
        \Cache::put($token,$cache,(time() - $cache['expire_time'])/60 + 1);
    }
}