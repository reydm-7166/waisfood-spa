<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Services\UserServices;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function __construct(
        protected UserServices $userServices,
        protected User $user
    ){}
    public function index()
    {
        return Inertia('Static/Login');
    }

    public function authenticate(Request $request)
    {
        $validated = $request->validate([
            'username' => ['required', 'min:3', 'max:50', 'alpha'],
            'password' => ['required', 'min:3', 'max:50'],
        ]);

        return $this->userServices->authenticateUserLogin($validated)
                ? redirect()->route('newsfeed.index')->with('message', 'Logged in succesfully!')
                : back()->with('message', "Credentials don't match");
    }

}
