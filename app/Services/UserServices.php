<?php

namespace App\Services;

use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class UserServices {
    public function authenticateUserLogin(Array $user_data) : bool
    {
        return Auth::attempt(['username' => $user_data['username'], 'password' => $user_data['password']]) ? true : false;
    }
}
