<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Actions\Auth\RegisterAction;
use App\Actions\Auth\LoginAction;

class AuthController extends Controller
{
    protected $registerAction;
    protected $loginAction;

    public function __construct(RegisterAction $registerAction, LoginAction $loginAction)
    {
        $this->registerAction = $registerAction;
        $this->loginAction = $loginAction;
    }

    public function register(Request $request) {
        return $this->registerAction->execute($request);
    }

    public function login(Request $request) {
        return $this->loginAction->execute($request);
    }
}
