<?php

namespace App\Repositories;

use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class UserRepository {
    public function validateUserRegistration(Array $id)
    {

    }
    public function authenticateUserLogin(Array $user_data) : bool
    {
        return Auth::attempt(['username' => $user_data['username'], 'password' => $user_data['password']]) ? true : false;
    }
}
