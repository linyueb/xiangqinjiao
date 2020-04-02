<?php

namespace App\Http\Middleware;

use App\Exceptions\AuthException;
use Closure;

class UserAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$request->hasHeader('Authorization')&&!isset($_GET['token'])){
            throw new AuthException('没有权限');
        }
        $token = empty($request->header('Authorization'))?$_GET['token']:$request->header('Authorization');
        $verifyToken = \Jwt::verifyToken($token);
        if (!$verifyToken){
            throw new AuthException('没有权限');
        }
        return $next($request);
    }
}
