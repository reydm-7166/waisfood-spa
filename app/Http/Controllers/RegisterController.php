<?php

namespace App\Http\Controllers;

use App\Services\UserServices;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\RedirectResponse;
use Inertia\Response;
use Inertia\ResponseFactory;


class RegisterController extends Controller
{
    public function __construct(
        protected UserServices $userServices,
        protected User $user
    ){}

    public function index(): Response|ResponseFactory
    {

        return Inertia('Static/Register');
    }

    public function store(StoreUserRequest $request): RedirectResponse
    {
        // if $request is valid
        $validated = $request->validated();

        // insert into database
        $insert = $this->user->registerUser($validated);

        return redirect()->route('login.index')->with('message', $insert);

    }

}
