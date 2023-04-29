<?php

namespace App\Services;

use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Ramsey\Uuid\Type\Integer;

class UserServices {

    public function __construct(
        protected User $user,
    ){}
    public function authenticateUserLogin(Array $user_data) : bool
    {
        return Auth::attempt(['username' => $user_data['username'], 'password' => $user_data['password']]) ? true : false;
    }

    public function getRecipientId($recipient_id) : Int
    {
        return $this->user->where('unique_id', $recipient_id)->pluck('id')->first();
    }
}
