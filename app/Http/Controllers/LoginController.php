<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Repositories\UserRepository;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function __construct(
        protected UserRepository $userRepository,
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

        if($this->userRepository->authenticateUserLogin($validated))
        {
            return redirect()->route('newsfeed.index')->with('message', 'Logged in succesfully!');
        }
        return back()->with('message', "Credentials don't match");
    }

}
