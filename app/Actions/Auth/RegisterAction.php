<?php

namespace App\Actions\Auth;

use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\UserRole;

class RegisterAction {
    public function execute($request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()], 400);
        }
    
        if (User::where('email', '=', $request->email)->first()) {
            return response()->json(['error' => 'Email is already taken!'], 400);
        }
    
        $user = User::register($request->name, $request->email, $request->password);
        $userRole = UserRole::createUserRole($user->id, 1);
    
        return response()->json([
            'success' => 'You have successfully registered!',
            'user' => $user,
            'userRole' => $userRole,
        ]);

    }
}