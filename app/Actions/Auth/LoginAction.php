<?php

namespace App\Actions\Auth;

use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Support\Facades\Session;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class LoginAction {

    public function execute($request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()], 400);
        }
    
        $credentials = $request->only('email', 'password');
    
        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'Invalid credentials'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'Could not create token'], 500);
        }
    
        $user = User::where('email', $request->email)->first();
        $role = UserRole::where('user_id', '=', $user->id)->first();
    
        Session::put('role_id', $role->role_id);
    
        return response()->json([
            'success' => 'You have successfully logged in!',
            'user' => $user,
            'token' => $token
        ]);
    }
    
}