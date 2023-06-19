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
            'points' => 'required|numeric',
            'role_id' => 'required|numeric'
        ]);
    
        if ($validator->fails()) return response()->json(['error' => $validator->errors()->first()]);
    
        if (User::where('email', '=', $request->email)->where('id', '!=', $id)->first()) return response()->json(['error' => 'Email is already taken!']);

        if (!Role::where('id', $request->role_id)->first()) return response()->json(['error' => 'Role with this id does not exist!']);
        
        $user = User::editUser($id, $request->name, $request->email, $request->points);
       
        $user_role = UserRole::editUserRole($id, $request->role_id);
    
        return response()->json([
            'success' => 'You have successfully updated user!',
            'user' => $user,
            'user_role' => $user_role,
        ]);

    }
}