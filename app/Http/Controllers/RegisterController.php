<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use App\Models\User;


class RegisterController extends Controller
{
    public function __construct(
        protected UserRepository $usersProcess,
        protected User $user
    ){}

    public function index()
    {

        return Inertia('Static/Register');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
                'firstname' => ['required', 'min:3', 'max:50', 'alpha'],
                'lastname' => ['required', 'min:3', 'max:50', 'alpha'],
                'age' => ['required', 'integer'],
                'email' => ['required', 'email'],
                'password' => ['required', 'min:3', 'max:50'],
                'username' => ['required', 'min:3', 'max:50'],
        ]);

        $insert = $this->user->registerUser($validated);

        return redirect()->route('login.index')->with('message', $insert);

    }

}
