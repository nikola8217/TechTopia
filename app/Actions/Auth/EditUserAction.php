<?php

namespace App\Actions\Auth;

use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Role;
use App\Models\UserRole;

class EditUserAction {
    public function execute($request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'role_id' => 'require|numeric'
        ]);
    
        if ($validator->fails()) return response()->json(['error' => $validator->errors()->first()], 400);
    
        if (User::where('email', '=', $request->email)->first()) return response()->json(['error' => 'Email is already taken!'], 400);

        if (!Role::where('id', $request->role_id)->first()) return response()->json(['error' => 'Role with this id does not exist!'], 400);
        
        $user = User::editUser($id, $request->name, $request->email);
        $user_role = UserRole::where('user_id', $id)->where('role_id', $request->role_id)->first();
        $user_role_upd = UserRole::editUserRole($user_role->id, $id, $request->role_id);
    
        return response()->json([
            'success' => 'You have successfully updated user!',
            'user' => $user,
            'user_role' => $user_role_upd,
        ]);

    }
}