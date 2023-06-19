<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Actions\Auth\RegisterAction;
use App\Actions\Auth\LoginAction;
use App\Actions\Auth\EditUserAction;
use App\Models\User;
use App\Models\UserRole;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    protected $registerAction;
    protected $loginAction;
    protected $editUserAction;

    public function __construct(RegisterAction $registerAction, LoginAction $loginAction, EditUserAction $editUserAction)
    {
        $this->registerAction = $registerAction;
        $this->loginAction = $loginAction;
        $this->editUserAction = $editUserAction;
    }

    public function register(Request $request) {
        return $this->registerAction->execute($request);
    }

    public function login(Request $request) {
        return $this->loginAction->execute($request);
    }

    public function getUsers() {
        $users = User::getUsers();

        return response()->json([
            'users' => $users 
        ]);
    }

    public function getUser($id) {
        $user = User::getUser($id);
        
        return response()->json([
            'user' => $user 
        ]);
    }

    public function editUser(Request $request, $id) {
        return $this->editUserAction->execute($request, $id);
    }

    public function deleteUser($id) {
        if(!User::where('id', $id)->first()) return response()->json(['error' => 'User does not exist!']);

        UserRole::where('user_id', $id)->delete();
        
        User::where('id', $id)->delete();

        return response()->json([
            'success' => 'You have successfully deleted user!'
        ]);
    }

    public function getRoles() {
        $roles = Role::all();

        return response()->json([
            'roles' => $roles 
        ]);
    }

}
