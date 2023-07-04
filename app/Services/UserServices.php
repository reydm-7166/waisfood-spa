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
        return (bool)Auth::attempt(['username' => $user_data['username'], 'password' => $user_data['password']]);
    }

    public function getRecipientId($recipient_id) : Int
    {
        return $this->user->where('unique_id', $recipient_id)->pluck('id')->first();
    }
}
