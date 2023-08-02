<?php

namespace App\Actions\Auth;

use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class ChangePasswordAction {

    public function execute($request, $id) {

        if (!User::where('id', $id)->first()) {
            return response()->json(['error'=>'User does not exist!']);
        }

        if (empty($request->old_password)|| empty($request->new_password)) {
            return response()->json(['error'=>'You must fill in all fields!']);
        }

        if(strlen($request->new_password) < 8){
            return response()->json(['error' => 'Password must have atleast 8 characters!']);
        }

        User::changePassword($id, $request->new_password);

        return response()->json([
            'success'=>'Password is changed!',
        ]);
    }
    
}