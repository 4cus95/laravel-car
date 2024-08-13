<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Resources\Token;
use App\Http\Service\Auth;

class TokenController extends Controller
{
    public function store(AuthRequest $request, Auth $auth)
    {
        $user = $auth->getUser($request);
        return response()->json(['token' => $user->createToken($request->device_name)->plainTextToken]);
    }
}